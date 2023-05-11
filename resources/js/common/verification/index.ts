import $ from 'jquery';
import { ajax, url } from "../../utils/index"
import "jquery-validation";



//定义业务逻辑类
class SetupPassword {
    private form: HTMLFormElement;
    constructor(form: string) {
        this.form = document.querySelector(form)!;
        this.init();
        console.log();
    }
    private init() {
        this.formValidate();
    }
    private formValidate() {
        $.validator.setDefaults({ errorClass: "validateErrors" })
        $(this.form).validate({
            rules:{
                "password":{
                    required:true
                },
                "password_confirmed":{
                    required:true
                }
            },
            messages:{
                "password":{
                    required:`请输入密码`
                },
                "password_confirmed":{
                    required:`请输入确认密码`
                }
            },
            submitHandler: async (form, event: JQueryEventObject) => {
                //组织浏览器默认提交行为
                event.preventDefault();
                //获取表单字段
                const data = $('#setUpPassword').serializeArray()
                data.push({ name:"id",value:window.location.href.split('/').reverse()[0] })
                //发送登录请求
                const res = await ajax({
                    url:url(`/setUpPassword`),
                    method: "post",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`input[name="_token"]`) as HTMLInputElement).value,
                    },
                    data
                }) as response
                //响应请求
                if (res.errorsObject && !res.success) {
                    $("#setUpPassword").validate().showErrors(res.errorsObject)
                }
                else location.href = url(`/clients/home`);
            }
        })
    }
}
new SetupPassword('#setUpPassword')