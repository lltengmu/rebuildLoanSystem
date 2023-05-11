import $ from "jquery";
import { ajax, loading, url } from "../../utils";
import notification, { notificationError } from "../../plugins/notification";
import "jquery-validation";
export default class FormSubmit {
    constructor(){
        this.registerEditForm()
    }
    private registerEditForm()
    {
        $.validator.setDefaults({ errorClass: "validateErrors" })
        console.log($(`#editprofile`).serializeArray());
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
                console.log(res);
                if(res.errorsObject && !res.success)$(`#editprofile`).validate().showErrors(res.errorsObject);
                if(res.success)notification(res.success);
                if(res.failed)notificationError(res.failed);
            }
        })
    }
}