import $ from "jquery";
import { loading, parse, registerFormValidation, showErrors, url } from "../../utils";
import notification from "../../plugins/notification";
import 'datatables.net';


export default class DataTables {
    private tableInstance;
    private current;
    constructor() {
        this.registerDataTable();
        this.registerOpration();
        this.registerFormValidate()
    }
    private registerDataTable() {
        this.tableInstance = $("#serviceProviderTable").DataTable({
            autoWidth: true,
            order: [0, "desc"],
            ajax: {
                url: url("/serviceProvider"),
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
                { "data": "company" },
                { "data": "email" },
                { "data": "status" },
                { "data": "operate" }
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
                                <select class="form-control form-control-sm" id="status-${id}" onchange="_handleStatus('${id}')">
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
                //挂载id
                globalThis["sp_id"] = id
                //页面记载动画
                loading.open();
                $.ajax({
                    url: url(`/individual/serviceProviderManagement/details/${id}`),
                    method: "get",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    success: (res) => {
                        const response = res as { company_id?: string, contact?: number, email?: string, first_name?: string, last_name?: string, mobile?: number }
                        Object.entries(response).forEach(([key, value]) => {
                            const dom = document.querySelector(`#${key}`)
                            if (dom?.tagName == "SELECT") {
                                const el = dom as HTMLSelectElement;
                                el.selectedIndex = Number(value);
                            } else {
                                const el = dom as HTMLInputElement;
                                el.value = value as string;
                            }
                        })
                        //关闭页面
                        loading.close()
                        $(`button[id="open"]`).click();
                    },
                    error: (error) => { }
                })
            },
            //删除功能
            _del: (id: string) => {
                const confirmButton = document.querySelector(".modal .confirm") as HTMLButtonElement
                confirmButton.onclick = () => this.confirmDelete(id)
            },
            //修改状态事件处理函数
            _handleStatus: async (id: string) => {
                //开启加载动画
                loading.open();
                //获取数据
                const value = (document.querySelector(`#status-${id}`)! as HTMLSelectElement).value;
                //发送请求
                await new Promise((resolve, reject) => {
                    $.ajax({
                        url: url(`/serviceProvider/${id}`),
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
                        const res = value as unknown as { success?: string, error?: string }
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
    private registerFormValidate() {
        registerFormValidation(
            `#individual-create-sp`,
            (form, event) => {

                event.preventDefault();
                $.ajax({
                    url: url(`/individual/serviceProviderManagement/add-sp`),
                    method: "post",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data: $(`#individual-create-sp`).serializeArray(),
                    success: (res) => {
                        if (res.status == "success") {
                            $(`#create-sp #cancel-modal`).click()
                            $(`#individual-create-sp`).find("input").val("")
                            $(`#individual-create-sp`).find("select").val("0")
                            this.tableInstance.ajax.reload()
                            notification(res.message)
                        }
                    },
                    error: (error) => {
                        if (error.status == 422) {
                            showErrors(
                                `#individual-create-sp`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    }
                })
            }
        )
        registerFormValidation(
            `#sp-details`,
            (form, event) => {

                event.preventDefault();
                $.ajax({
                    url: url(`/individual/serviceProviderManagement/edit-sp/${globalThis["sp_id"]}`),
                    method: "post",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data: $(`#sp-details`).serializeArray(),
                    success: (res) => {
                        if (res.status == "success") {
                            $(`#drawer #cancel`).click()
                            this.tableInstance.ajax.reload()
                            notification(res.message)
                        }
                    },
                    error: (error) => {
                        if (error.status == 422) {
                            showErrors(
                                `#sp-details`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    }
                })
            }
        )
    }
}