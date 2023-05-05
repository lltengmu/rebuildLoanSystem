import $ from "jquery";
import { loading, url } from "../../utils";
import notification from "../../plugins/notification";
import 'datatables.net';


export default class DataTables {
    private tableInstance;
    private current;
    constructor() {
        this.registerDataTable();
        this.registerOpration();
    }
    private registerDataTable() {
        console.log(url("/serviceProvider"));
        this.tableInstance = $("#serviceProviderTable").DataTable({
            autoWidth: true,
            order: [0, "desc"],
            ajax: {
                url: url("/serviceProvider"),
                method: "get",
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                dataSrc: (myJson) => {
                    console.log(myJson);
                    return myJson;
                },
            },
            columns: [
                {
                    "data": "num"
                },
                {
                    "data": "first_name"
                },
                {
                    "data": "last_name"
                },
                {
                    "data": "company"
                },
                {
                    "data": "email"
                },
                {
                    "data": "status"
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
                    targets: [5],
                    width: "200px",
                    render: (data, type, row, meta) => {
                        const id = row.id
                        return `
                            <div class="form-group" style="margin-top:0.65rem;">
                                <select class="form-control form-control-sm" id="status-${id}" onchange="_handleCaseStatus('${id}')">
                                    <option value="1" ${row.status == 1 ? "selected" : ""}>啓用</option>
                                    <option value="0" ${row.status == 0 ? "selected" : ""}>禁用</option>
                                </select>
                            </div>
                        `
                    }
                },
                {
                    targets: [6],
                    width: "25%",
                    render: (data, type, row, meta) => {
                        const id = row.id;
                        return `
                            <div class="opration">
                                <button type="button" class="btn btn-outline-info" onclick="_view('${id}')">查看</button>
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target=".drawer">查看</button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target=".delete-modal" onclick="_del('${id}')">删除</button>
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
        //否则注册函数,让按钮具备点击事件
        else Object.entries(this.opration()).forEach(([key, value]) => globalThis[key] = value)
    }
    /**
     * 定义按钮点击事件处理函数
     * Define button click event handling functions
     */
    private opration(): { [key: string]: Function } {
        return {
            //查看详情
            _view: (id: string) => {
                // loading.open();
                const els = [...Array.from(document.querySelectorAll(`#spdetails input`)),...Array.from(document.querySelectorAll(`#spdetails select`))]
                // console.log(els);
                const handleSuccess = (res) =>{}
                $.ajax({
                    url:url(`/individual/serviceProviderManagement/details/${id}`),
                    method:"get",
                    headers:{
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    success:(res) =>handleSuccess(res),
                    error:(error) =>{}
                })
            },
            //删除功能
            _del: (id: string) => {
                const confirmButton = document.querySelector(".modal .confirm") as HTMLButtonElement
                confirmButton.onclick = () => this.confirmDelete(id)
            },
            //"导出所有"事件处理函数
            _handleExportAll: () => window.location.href = url(`/individual/clientsManagment/exportAll`),
            //修改状态事件处理函数
            _handleCaseStatus: async (id:string) => {
                //开启加载动画
                loading.open();
                //获取数据
                const value = (document.querySelector(`#status-${id}`)! as HTMLSelectElement).value;
                //发送请求
                await new Promise((resolve, reject) => {
                    $.ajax({
                        url: url(`/clients/${id}`),
                        method: "PUT",
                        headers: {
                            "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                        },
                        data: {
                            update: [{ status: Number(value) }]
                        },
                        success: (res) => resolve(res),
                        error: (error) => reject(error)
                    })
                }).then(
                    (value) => {
                        loading.close();
                        this.tableInstance.ajax.reload();
                        const res = value as unknown as { success?:string,error?:string }
                        const message = res.success as string
                        notification(message)
                    },
                    (error) => {
                        loading.close();
                        console.log(error);
                    }
                )
            },
        }
    }
    /**
     * delete case
     */
    private async confirmDelete(id: string) {
        //关闭模态框
        $(`.delete-modal #cancel`).click()
        //发起请求删除
        $.ajax({
            url: url(`/serviceProvider/${id}`),
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