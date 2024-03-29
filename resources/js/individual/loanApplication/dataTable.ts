import $ from "jquery";
import { loading, registerFunction, url } from "../../utils";
import notification, { customAlert } from "../../plugins/notification";
import 'datatables.net';


export default class LoanApplicationDataTable {
    private tableInstance;
    constructor() {
        //注册事件处理函数
        registerFunction(this.opration())
        //注册data table
        this.registerDataTable();
        //注册excel文件上传功能
        this.registerUpload();
    }
    private registerDataTable() {
        this.tableInstance = $("#caseTable").DataTable({
            autoWidth: true,
            order: [0, "desc"],
            ajax: {
                url: url("/individual/loanApplication/cases"),
                method: "post",
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                dataSrc: (myJson) => myJson
            },
            columns: [
                { "data": "num" },
                { "data": "first_name" },
                { "data": "last_name" },
                { "data": "loan_amount" },
                { "data": "company" },
                { "data": "repayment_period" },
                { "data": "disbursement_date" },
                { "data": "case_status" },
                { "data": "operate" }
            ],
            columnDefs: [
                {
                    targets: [7],
                    width: "200px",
                    render: (data, type, row, meta) => {
                        if (row.case_status == 5) {
                            return `
                                <div class="bootstrap-badge center">
                                    <span class="badge badge-danger">申請失敗，請重新選擇服務提供商</span>
                                </div>
                            `
                        }
                        const id = row.id
                        const company = row.company
                        return `
                            <div class="form-group" style="margin-top:0.65rem;">
                                <select class="form-control form-control-sm" id="select-case-status-${id}" onchange="_handleCaseStatus('${id}','${company}')">
                                    <option value="1" ${row.case_status == 1 ? "selected" : ""}>提交</option>
                                    <option value="2" ${row.case_status == 2 ? "selected" : ""}>轉交到服務提供者</option>
                                    <option value="5" ${row.case_status == 5 ? "selected" : ""}>申請失败</option>
                                </select>
                            </div>
                        `
                    }
                },
                {
                    targets: [8],
                    width: "25%",
                    render: (data, type, row, meta) => {
                        const id = row.id;
                        return `
                            <div class="opration">
                                <button type="button" class="btn btn-outline-primary" onclick="_export('${id}')">匯出xlsx</button>
                                <button type="button" class="btn btn-outline-info" onclick="_view('${id}')">查看</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="_viewFile('${id}')">文件查看</button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target=".delete-modal" onclick="_del('${id}')">删除</button>
                            </div>
                        `
                    }
                },
            ],
        })
    }
    /**
     * 定义按钮点击事件处理函数
     * Define button click event handling functions
     */
    private opration(): { [key: string]: Function } {
        return {
            _export: (id: string) => window.location.href = url(`/individual/loanApplication/export/${id}`),
            _view: (id: string) => window.location.href = url(`/individual/loanApplication/details/${id}`),
            _viewFile: (id: string) => {
                const pendingView = new Promise<Record<string, any>>((resolve, reject) => {
                    $.ajax({
                        url: url(`/case-attachments/${id}`),
                        method: "get",
                        success: (res) => {
                            resolve(res)
                        },
                        error: (error) => console.log(error)
                    })
                })
                pendingView.then(
                    (res) => {
                        $(`#render`).html((key, old) => res.data)
                        $(`#attachment-list`).click()
                    },
                    () => { }
                )
            },
            _del: (id: string) => {
                const confirmButton = document.querySelector(".modal .confirm") as HTMLButtonElement
                confirmButton.onclick = () => this.confirmDelete(id)
            },
            //"导出所有"事件处理函数
            _handleExportAll: () => window.location.href = url(`/individual/loanApplication/exportAll`),
            //改变case状态
            _handleCaseStatus: (id: string, company: string) => {
                //获取数据
                const value = (document.querySelector(`#select-case-status-${id}`)! as HTMLSelectElement).value;
                if (value == "2" && company == "null") {
                    customAlert.open({ type: "warning", message: "请先选择服务提供商" })
                    this.tableInstance.ajax.reload();
                    return;
                }
                //开启加载动画
                loading.open();
                //发送请求
                const pending = new Promise((resolve, reject) => {
                    $.ajax({
                        url: url(`/cases/${id}`),
                        method: "PUT",
                        headers: {
                            "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                        },
                        data: { case_status: Number(value) },
                        success: (res) => resolve(res),
                        error: (error) => reject(error)
                    })
                })
                pending.then(
                    (value) => {
                        loading.close();
                        this.tableInstance.ajax.reload();
                    },
                    (error) => {
                        loading.close();
                        console.log(error);
                    }
                )
            },
            _uploadExcel: () => $(`#uploadFile`).click(),
            _downloadAttachment: (dom) => {
                const id = $(dom).attr("attachment-id");
                window.location.href = url(`/download-attachments/${id}`)
            }
        }
    }
    private registerUpload() {
        //注册事件
        const uploadField = document.querySelector(`#uploadFile`) as HTMLInputElement;
        //允许上传的文件
        const allowFile = ['.xlsx', '.cvs'];
        uploadField.addEventListener("change", async (event: Event) => {
            let target = event.target as HTMLInputElement;
            //获取文件类型
            const type = target.value.match(/\..*/ig)![0]
            //获取文件对象
            const file = target.files![0]
            let formData = new FormData();
            formData.append("file", file);
            //发送请求
            $.ajax({
                url: url("/individual/loanApplication/uploadExcel"),
                method: "post",
                data: formData,
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                processData: false,
                contentType: false,
                success: (res) => {
                    if (res.status == "success") {
                        this.tableInstance.ajax.reload();
                        notification("上传成功")
                    }
                },
                error: (error) => console.log(error)
            })
        })
    }
    /**
     * delete case
     */
    private confirmDelete(id: string) {
        //关闭模态框
        $(`.delete-modal #cancel`).click()
        //发起请求删除
        $.ajax({
            url: url(`/cases/${id}`),
            method: "delete",
            headers: {
                "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
            },
            success: (res) => {
                if (res.success) {
                    this.tableInstance.ajax.reload();
                    notification(res.success)
                }
            }
        });
    }
}