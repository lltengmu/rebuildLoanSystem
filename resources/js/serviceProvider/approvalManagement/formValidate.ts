import { registerFormValidation, url } from "../../utils";


export default class FormValidate {
    constructor(){
        this.register()
    }
    public register(){
        registerFormValidation(
            `#approval-form`,
            (form,event) => {
                $.ajax({
                    url:url(``)
                })
            }
        )
    }
}