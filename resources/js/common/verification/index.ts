import $ from 'jquery';
import { parse, registerFormValidation, showErrors, url } from "../../utils/index"
import notification from "../../plugins/notification";



//定义业务逻辑类
class EmailVerification {
    constructor() {
        this.formValidate()
    }
    private formValidate() {
        registerFormValidation(
            `#email-verification`,
            (form,e) =>{
                e.preventDefault()
                $.ajax({
                    url:url(`/verification/${window.location.href.split('/').reverse()[0]}`),
                    method:"post",
                    headers:{
                        "X-CSRF-token": (document.querySelector(`input[name="_token"]`) as HTMLInputElement).value,
                    },
                    data:$(`#email-verification`).serializeArray(),
                    success:(res) => {
                        if(res.status == "success"){
                            notification(res.message)
                            setTimeout(() => window.location.href = url(`/clients/login`),2000)
                        }
                    },
                    error:(error) => {
                        if(error.status == 422){
                            showErrors(
                                `#email-verification`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    }
                })
            }
        )
    }
}
window.onload = () => new EmailVerification()