import $ from 'jquery';
import { ajax, url } from "../../utils/index";
import { customAlert } from "../../plugins/notification"
import "jquery-validation";



//定义业务逻辑类
export default class LoanForm {
    constructor() {
        this.loginFormValidate();
    }
    private loginFormValidate() {
        $.validator.setDefaults({ errorClass: "validateErrors" })
        $("#register").validate({
            submitHandler: async (form, event: JQueryEventObject) => {
                //组织浏览器默认提交行为
                event.preventDefault();
                //获取表单字段
                const data = $('#register').serializeArray()
                if(!$("#agree").prop("checked")){
                    customAlert.open({
                        type:"warning",
                        message:"请先同意xxxx协议"
                    })
                    return;
                }
                const res = await ajax({
                    headers: {
                        "X-CSRF-token": (document.querySelector(`input[name="_token"]`) as HTMLInputElement).value,
                    },
                    url:url(`/new-loanApplication`),
                    method:"post",
                    data
                }) as response
                if(res.errorsObject && !res.success){
                    $("#register").validate().showErrors(res.errorsObject)
                }
                //else window.location.href = `/clients/login`
            }
        })
    }
}