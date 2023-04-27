import $ from 'jquery';
import { ajax, url } from "../utils/index"
import "jquery-validation";



//定义业务逻辑类
class IndividualLogin {
    private loginForm: HTMLFormElement;
    private captchatImg;
    private captchaApiResponse: captchaApiResponse | null = null
    constructor(form: string, captchaImg: HTMLImageElement) {
        this.loginForm = document.querySelector(form)!;
        this.captchatImg = captchaImg;
        this.init();
    }
    private init() {
        this.captchatImg.addEventListener('click', () => this.refreshCaptcha());
        this.loginFormValidate();
    }
    private refreshCaptcha() {
        this.captchatImg.src = url("/captcha?") + Math.random()
    }
    private loginFormValidate() {
        $.validator.setDefaults({ errorClass: "validateErrors" })
        $(this.loginForm).validate({
            rules: {
                'email': {
                    required: true,
                },
                "password": {
                    required: true
                },
                "captcha": {
                    required: true
                }
            },
            messages: {
                "email": {
                    required: `请输入邮箱`,
                },
                "password": {
                    required: `请输入密码`
                },
                "captcha": {
                    required: `请输入验证码`
                }
            },
            submitHandler: async (form, event: JQueryEventObject) => {
                //组织浏览器默认提交行为
                event.preventDefault();
                //获取当前用户登录身份
                const identify = (document.querySelector(`input[name="_identify"]`) as HTMLInputElement).value;
                //获取表单字段
                const data = $('#login-form').serializeArray()
                //发送登录请求
                const res = await ajax({
                    url:url(`/${identify}/login`),
                    method: "post",
                    data
                }) as response
                //响应请求
                if (res.errorsObject && !res.success) {
                    if (res.errorsObject['captcha']) this.refreshCaptcha();
                    $("#login-form").validate().showErrors(res.errorsObject)
                }
                else location.href = url(`/${identify}/home`);
            }
        })
    }
}
new IndividualLogin('#login-form', document.querySelector('img')!)