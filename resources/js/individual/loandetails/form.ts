import $ from "jquery";
import { ajax, loading, url } from "../../utils";
import notification, { notificationError } from "../../plugins/notification";
import "jquery-validation";

export default class IndividualViewLoanDetails {
    constructor (){
        $.validator.setDefaults({ errorClass: "validateErrors" })
        this.registerForm()
    }
    private registerForm(){
        const id = window.location.href.split("/").reverse()[0];
        $(`#edit`).validate({
            submitHandler:async (form,event:JQueryEventObject)=>{
                event.preventDefault();
                const res = await ajax({
                    url:url(`/individual/loanApplication/edit/${id}`),
                    method:"post",
                    headers:{
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data:$(`#edit`).serializeArray()
                }) as { success?:string ,failed:string ,type:string,errorsObject:{ [key:string]:string }}
                
                if(res.errorsObject && !res.success)$(`#edit`).validate().showErrors(res.errorsObject);
                if(res.success)notification(res.success);
                if(res.failed)notificationError(res.failed);
            }
        })
    }
}