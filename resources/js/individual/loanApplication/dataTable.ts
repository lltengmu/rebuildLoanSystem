import $ from "jquery";
import { loading, url } from "../../utils";
import 'datatables.net';

export default class LoanApplicationDataTable {
    private tableInstance;
    constructor() {
        this.registerDataTable();
        this.registerOpration();
    }
    private registerDataTable() {
        this.tableInstance = $("#example").DataTable({
            autoWidth: true,
            order: [0, "desc"],
            ajax: {
                url: url("/individual/loanApplication/cases"),
                method: "post",
                //post请求需要在data里面传递 token
                data: { _token: (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content },
                dataSrc: (myJson) => myJson,
            },
            columns: [
                {
                    "data": "id"
                },
                {
                    "data": "first_name"
                },
                {
                    "data": "last_name"
                },
                {
                    "data": "loan_amount"
                },
                {
                    "data": "company"
                },
                {
                    "data": "repayment_period"
                },
                {
                    "data": "disbursement_date"
                },
                {
                    "data": "case_status"
                },
                {
                    "data": "operate"
                }
            ],
            columnDefs: [
                {
                    "targets": [0],
                    "width": "5%"
                },
                {
                    targets: [7],
                    width:"auto",
                    render: (data, type, row, meta) => {
                        if (row.case_status == 5) {
                            return `
                                <div class="bootstrap-badge center">
                                    <span class="badge badge-danger">申請失敗，請重新選擇服務提供商</span>
                                </div>
                            `
                        }
                        return `
                            <div class="form-group" style="margin-top:0.65rem;">
                                <select class="form-control form-control-sm" id="select-case-status-${row.id}" onchange="_handleCaseStatus(${row.id})">
                                    <option value="1" ${row.case_status == 1 ? "selected" : ""}>提交</option>
                                    <option value="2" ${row.case_status == 3 ? "selected" : ""}>轉交到服務提供者</option>
                                    <option value="5" ${row.case_status == 5 ? "selected" : ""}>申請失敗</option>
                                </select>
                            </div>
                        `
                    }
                },
                {
                    targets: [8],
                    width: "25%",
                    render: (data, type, row, meta) => {
                        return `
                            <div class="opration">
                                <button type="button" class="btn btn-outline-primary" onclick="_export(${row.id})">匯出xlsx</button>
                                <button type="button" class="btn btn-outline-info" onclick="_view(${row.id})">查看</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="_viewFile(${row.id})">文件查看</button>
                                <button type="button" class="btn btn-outline-danger" onclick="_del(${row.id})">删除</button>
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
            _export: (id: number) => console.log(`到处excel:id->${id}`),
            _viewFile: (id: number) => console.log(`文件查看:id->${id}`),
            _view: (id: number) => console.log(`查看:id->${id}`),
            _del: (id: number) => console.log(`导出：id->${id}`),
            _handleCaseStatus:async (id)=>{
                //开启加载动画
                loading.open();
                //获取数据
                const value = (document.querySelector(`#select-case-status-${id}`)! as HTMLSelectElement).value;
                const _token = (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content;
                //发送请求
                await new Promise((resolve,reject) =>{
                    $.ajax({
                        url:url(`/cases/${id}`),
                        method:"PUT",
                        data: {
                            _token,
                            case_status:value,
                        },
                        success:(res)=>resolve(res),
                        error:(error)=>reject(error)
                    })
                }).then(
                    (value)=>{
                        loading.close();
                        this.tableInstance.reload();
                    },
                    (error) =>{
                        loading.close();
                        console.log(error);
                    }
                )
            }
        }
    }
}