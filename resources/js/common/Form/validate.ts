import $ from 'jquery';
import { ajax, url } from "../../utils/index"
import "jquery-validation";



//定义业务逻辑类
export default class IndividualLogin {
    constructor() {
        this.loginFormValidate();
    }
    private loginFormValidate() {
        $.validator.setDefaults({ errorClass: "validateErrors" })
        //自定义验证规则
        $.validator.addMethod("selectRequired",function(value,element){
            return value == "0" ? false : true 
        })
        $("#register").validate({
            
            submitHandler: async (form, event: JQueryEventObject) => {
                //组织浏览器默认提交行为
                event.preventDefault();
                //获取表单字段
                const data = $('#register').serializeArray()
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
                else window.location.href = `/clients/login`
            }
        })
    }
}