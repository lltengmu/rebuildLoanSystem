import $ from "jquery";
import { ajax, loading, url } from "../../utils";
import notification, { notificationError } from "../../plugins/notification";
import "jquery-validation";
export default class FormSubmit {
    constructor(){
        $.validator.setDefaults({ errorClass: "validateErrors" })
        this.registerEditForm()
        this.registerChangePassword()
    }
    private registerEditForm()
    {
        $(`#editprofile`).validate({
            submitHandler:async (form,e:JQueryEventObject) => {
                e.preventDefault();
                const res = await ajax({
                    url:url(`/clients/profile/edit`),
                    method:"post",
                    headers:{
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data:$(`#editprofile`).serializeArray()
                }) as { success?:string ,failed:string ,type:string,errorsObject:{ [key:string]:string }}
                
                if(res.errorsObject && !res.success)$(`#editprofile`).validate().showErrors(res.errorsObject);
                if(res.success)notification(res.success);
                if(res.failed)notificationError(res.failed);
            }
        })
    }
    private registerChangePassword()
    {
        $(`#settingpassword`).validate({
            submitHandler:async (form,event:JQueryEventObject) =>{
                event.preventDefault();
                const res = await ajax({
                    url:url(`/clients/profile/change-password`),
                    method:"post",
                    headers:{
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data:$(`#settingpassword`).serializeArray()
                }) as { success?:string ,failed:string ,type:string,errorsObject:{ [key:string]:string }}
                
                if(res.errorsObject && !res.success)$(`#settingpassword`).validate().showErrors(res.errorsObject);
                if(res.success)notification(res.success);
                if(res.failed)notificationError(res.failed);
            }
        })
    }
}