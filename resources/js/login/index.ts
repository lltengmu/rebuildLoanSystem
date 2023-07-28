import $ from "jquery"
import { ajax, parse, registerFormValidation, showErrors, url } from "../utils/index"


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
        registerFormValidation(
            `#login-form`,
            (form, event: JQueryEventObject) => {
                //组织浏览器默认提交行为
                event.preventDefault();
                //获取当前用户登录身份
                const identify = (document.querySelector(`input[name="_identify"]`) as HTMLInputElement).value;
                //获取表单字段
                const data = $('#login-form').serializeArray()
                //发送登录请求
                $.ajax({
                    url:url(`/${identify}/login`),
                    method:"post",
                    data:data,
                    headers: {
                        "X-CSRF-token": (document.querySelector(`input[name="_token"]`) as HTMLInputElement).value,
                    },
                    success:(res) => {
                        window.location.href = url(`/${identify}/home`)
                    },
                    error:(error) => {
                        if(error.status == 422){
                            showErrors(
                                `#login-form`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    }
                })
            }
        )
    }
}
new IndividualLogin('#login-form', document.querySelector('img')!)