import $ from 'jquery';
import { parse, registerFormValidation, showErrors, url } from "../../utils/index";
import notification, { customAlert } from "../../plugins/notification"

//定义业务逻辑类
export default class LoanForm {
    constructor() {
        this.loginFormValidate();
    }
    private loginFormValidate() {
        registerFormValidation(
            `#register`,
            (form, e) => {
                e.preventDefault();
                if (!$("#agree").prop("checked")) {
                    customAlert.open({
                        type: "warning",
                        message: "请先同意xxxx协议"
                    })
                    return;
                }
                $.ajax({
                    headers: {
                        "X-CSRF-token": (document.querySelector(`input[name="_token"]`) as HTMLInputElement).value,
                    },
                    url: url(`/new-loanApplication`),
                    method: "post",
                    data: $('#register').serializeArray(),
                    success: (res) => {
                        if (res.status == "success") {
                            $(`#register`).find("input textarea").val("")
                            $(`#register`).find("select").val(0)
                            notification(res.message)
                            setTimeout(() => window.location.href = url(`/clients/login`),2000)
                        }
                    },
                    error: (error) => {
                        if (error.status == 422) {
                            showErrors(
                                `#register`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    },
                })
            }
        )
    }
}