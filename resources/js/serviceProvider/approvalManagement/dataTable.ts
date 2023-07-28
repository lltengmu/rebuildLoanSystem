import $ from "jquery";
import { loading, url, registerFunction, showErrors, parse, registerFormValidation } from "../../utils";
import notification, { customAlert } from "../../plugins/notification";
import 'datatables.net';

export default class PendingDataTable {
    private pendingTableInstance;
    private approvalTableInstance;
    constructor() {
        registerFunction(this.opration())
        this.registerDataTable();
        this.registerArovalDataTable();
    }
    private registerDataTable() {
        this.pendingTableInstance = $("#pending").DataTable({
            autoWidth: true,
            order: [0, "desc"],
            ajax: {
                url: url("/sp/ApprovalManagement/pending"),
                method: "post",
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                dataSrc: (myJson) => myJson.data,
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
                    width: "25%",
                    render: (data, type, row, meta) => {
                        const id = row.id;
                        return `
                            <div class="opration d-flex justify-content-start align-items-center">
                                <div class="form-group m-0 pr-2" style="width:10vw;">
                                    <select class="form-control form-control-sm" id="select-case-status-${id}" onchange="_handleSelect('${id}')">
                                        <option value="2">請選擇</option>
                                        <option value="3">同意</option>
                                        <option value="5">拒绝</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target=".delete-modal" onclick="_reject('${id}')">驳回</button>
                            </div>
                        `
                    }
                },
            ],
        })
    }
    private registerArovalDataTable() {
        this.approvalTableInstance = $("#Approval-Reject").DataTable({
            autoWidth: true,
            order: [0, "desc"],
            ajax: {
                url: url("/sp/ApprovalManagement/approvalList"),
                method: "post",
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                dataSrc: (myJson) => {
                    console.log(myJson.data);
                    return myJson.data
                },
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
                    targets: [8],
                    render: (data, type, row, meta) => {
                        const id = row.id;
                        return `
                            <div class="opration d-flex justify-content-start align-items-center" onclick="_withdraw('${id}')">
                                <button type="button" class="btn btn-outline-secondary">撤回操作</button>
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
            _uploadExcel: () => $(`#uploadExcel`).click(),
            _reject: (id) => {
                const el = document.querySelector(`button[class*="confirm"]`) as HTMLButtonElement
                el.onclick = () => this.handleRejectCase(id)
            },
            _handleSelect: (id) => {
                const decide = new Promise((resolve, reject) => {
                    if ($(`#select-case-status-${id}`).val() == 3) resolve(id)
                    else if ($(`#select-case-status-${id}`).val() == 5) reject(id)
                });
                decide.then(
                    //handle agree
                    (id) => {
                        $(`#approvalbtn`).click();
                        const el = document.querySelector(`#approval #check`) as HTMLButtonElement;
                        el.onclick = (event) => {
                            $.ajax({
                                url: url(`/sp/ApprovalManagement/approval/${id}`),
                                method: "PUT",
                                data: $(`#approval-form`).serializeArray(),
                                headers: {
                                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                                },
                                success: (res) => {
                                    if (res.status == "success") {
                                        //关闭模态框
                                        $(`#approval #cancel`).click()
                                        //清除模态框数据数据
                                        $(`#approval-form`).find("input,textarea").val("")
                                        //显示通知
                                        notification(res.message)
                                        //重新加载数据表
                                        this.pendingTableInstance.ajax.reload();
                                        this.approvalTableInstance.ajax.reload();
                                    }
                                },
                                error: (error) => {
                                    if (error.status == 422) {
                                        showErrors(
                                            `#approval-form`,
                                            parse(error.responseJSON.errors)
                                        )
                                    }
                                }
                            })
                        }
                    },
                    //handle disagree
                    (id) => {
                        $(`#refuseBtn`).click();
                        const el = document.querySelector(`#refuse #check`) as HTMLButtonElement;
                        el.onclick = (event) => {
                            $.ajax({
                                url: url(`/sp/ApprovalManagement/refuse/${id}`),
                                method: "post",
                                data: $(`#refuse-form`).serializeArray(),
                                headers: {
                                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                                },
                                success: (res) => {
                                    if (res.status == "success") {
                                        //关闭模态框
                                        $(`#refuse #cancel`).click()
                                        //清除模态框数据数据
                                        $(`#refuse-form`).find("textarea").val("")
                                        //显示通知
                                        notification(res.message)
                                        //重新加载数据表
                                        this.pendingTableInstance.ajax.reload();
                                        this.approvalTableInstance.ajax.reload();
                                    }
                                },
                                error: (error) => {
                                    if (error.status == 422) {
                                        showErrors(
                                            `#refuse-form`,
                                            parse(error.responseJSON.errors)
                                        )
                                    }
                                }
                            })
                        }
                    }
                )
            },
            _withdraw: (id) => {
                $.ajax({
                    method: "PUT",
                    url: url(`/sp/ApprovalManagement/withdraw/${id}`),
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    success: (res) => {
                        if (res.message == "操作成功") {
                            notification(res.message)
                            this.approvalTableInstance.ajax.reload();
                            this.pendingTableInstance.ajax.reload();
                        }
                    },
                    error: (error) => {
                        console.log(error);
                    }
                })
            }
        }
    }
    private handleRejectCase(id) {
        $(`button[id="cancel"]`).click();

        $.ajax({
            url: url(`/sp/ApprovalManagement/reject/${id}`),
            method: "PUT",
            headers: {
                "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
            },
            success: (res) => {
                if (res.status == "success") notification(res.message)
                this.pendingTableInstance.ajax.reload();
                this.approvalTableInstance.ajax.reload();
            },
            error: (error) => {
                console.log(error);
            }
        })
    }
}