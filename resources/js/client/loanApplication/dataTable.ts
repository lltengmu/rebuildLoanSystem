import $ from "jquery";
import { ajax, loading, url } from "../../utils";
import notification, { notificationError } from "../../plugins/notification";
import 'datatables.net';
import "jquery-validation";


export default class LoanApplicationDataTable {
    private tableInstance;
    constructor() {
        this.registerDataTable();
        this.registerOpration();
        this.registerFormSubmit()
        this.registeUpload()
    }
    private registerDataTable() {
        this.tableInstance = $("#caseTable").DataTable({
            autoWidth: true,
            order: [0, "desc"],
            ajax: {
                url: url("/clients/home/cases"),
                method: "get",
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                dataSrc: (myJson) => myJson,
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
                    "targets": [0],
                    "width": "5%"
                },
                {
                    targets: [8],
                    render: (data, type, row, meta) => {
                        const id = row.case_id;
                        return `
                            <div class="opration">
                                <button type="button" class="btn btn-outline-info" onclick="_edit('${id}')">编辑</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="_viewFile('${id}')">文件查看</button>
                            </div>
                        `
                    }
                },
            ],
        })
    }
    /**
     * 注册按钮点击事件
     * register button click event
     */
    private registerOpration() {
        let exits = false;
        //检查window对象 是否与点击事件函数命名冲突
        Object.entries(window).forEach(([key, value]) => {
            if (Object.keys(this.opration()).includes(key)) exits = true;
        })
        //冲突则抛出异常
        if (exits) throw new ReferenceError("自定义函数与window对象内置函数或属性冲突");
        //否则注册函数,让第9列的按钮具备点击事件
        else Object.entries(this.opration()).forEach(([key, value]) => globalThis[key] = value)
    }
    /**
     * 定义按钮点击事件处理函数
     * Define button click event handling functions
     */
    private opration(): { [key: string]: Function } {
        return {
            _edit: (id: string) => {
                loading.open();
                //获取数据之后的事件处理函数
                const handleSuccess = (res) => {
                    const response = res as { loan_amount?: number, repayment_period?: number, purpose?: string }
                    Object.entries(response).forEach(([key, value]) => {
                        const dom = document.querySelector(`div#showdetails #${key}`)
                        if (dom?.tagName == "SELECT") {
                            const el = dom as HTMLSelectElement;
                            el.selectedIndex = Number(value);
                        } else {
                            const el = dom as HTMLInputElement;
                            el.value = value as string;
                        }
                    })
                    loading.close()
                    $(`button[id="show-open"]`).click();
                }
                $.ajax({
                    url: url(`/clients/home/details/${id}`),
                    method: "post",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    success: (res) => handleSuccess(res),
                    error: (error) => { }
                })
                //处理弹窗事件 提交或取消
                const confirm = document.querySelector(`#update button[id="save"]`) as HTMLButtonElement;
                confirm.onclick = async (e) => {
                    e.preventDefault();
                    const res = await ajax({
                        url: url(`/clients/home/edit/${id}`),
                        method: "post",
                        headers: {
                            "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                        },
                        data: $(`#update`).serializeArray()
                    }) as { success: string, failed: string, type?: string, errorsObject?: { [key: string]: string } };
                    if (res.errorsObject) {
                        $(`#update`).validate().showErrors(res.errorsObject)
                        return;
                    }
                    $(`#update button[id="cancel"]`).click();
                    this.tableInstance.ajax.reload();
                    if (res.success) notification(res.success)
                    if (res.failed) notificationError(res.failed)
                }
            },
            _viewFile: (id: string) => {
                const pendingView = new Promise<Record<string,any>>((resolve, reject) => {
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
                        $(`#render`).html((key,old) => res.data)
                        $(`#upload-modal`).click()
                        const el = document.querySelector(`#upload-block`) as HTMLDivElement;
                        el.onclick = () => {
                            globalThis["case_id"] = id;
                            $(`input[id="uploadFile"]`).click();
                        }
                    },
                    () => { }
                )
            },
        }
    }
    private registerFormSubmit() {
        //设置默认配置
        $.validator.setDefaults({ errorClass: "validateErrors" })
        //自定义验证规则,这里用不上
        $.validator.addMethod("selectRequired", function (value, element) {
            return value != "0" ? true : false;
        });
        //初始化表单验证
        $(`#add`).validate({
            submitHandler: async (form, event: JQueryEventObject) => {
                event.preventDefault()
                const res = await ajax({
                    url: url(`/clients/home/add`),
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    method: "post",
                    data: $(`#add`).serializeArray()
                }) as response;
                if (res.errorsObject && !res.success) {
                    $(`#add`).validate().showErrors(res.errorsObject)
                };
                if (res.success) {
                    notification(res.success)
                    $(`#add-cancel`).click();
                    this.tableInstance.ajax.reload();
                }
            }
        })
    }
    private registeUpload() {
        //注册事件
        const uploadField = document.querySelector(`#uploadFile`) as HTMLInputElement;
        uploadField.addEventListener("change", (event: Event) => {
            let target = event.target as HTMLInputElement;
            //获取文件类型
            const type = target.value.match(/\..*/ig)![0]
            //获取文件对象
            const file = target.files![0]
            let formData = new FormData();
            formData.append("file", file);
            //发送请求
            $.ajax({
                url: url(`/upload-attachment/${globalThis["case_id"]}`),
                method: "post",
                data: formData,
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                processData: false,
                contentType: false,
                success: (res) => {
                    if (res.status == "success") {
                        $(`#render`).html((key, old) => {
                            return res.data
                        })
                    }
                },
                error: (error) => console.log(error)
            })
        })
    }
}