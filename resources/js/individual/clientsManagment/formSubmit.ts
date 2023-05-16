import $ from "jquery";
import { loading, url ,ajax } from "../../utils";
import notification,{ notificationError } from "../../plugins/notification";

export default class FormSubmit {
    constructor(public dataTable){}
    private registerFormSubmit(){
        $(`#IndividualCreateClient`).validate({
            submitHandler:async (form,event:JQueryEventObject) =>{
                event.preventDefault();
                const res = await ajax({
                    url:url(`/individual/clientsManagment/edit/`),
                    method:"post",
                    headers:{
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data:$(`#editClientInfomation`).serializeArray()
                }) as { success?:string ,failed:string ,type:string,errorsObject:{ [key:string]:string }}
                
                if(res.errorsObject && !res.success)$(`#editClientInfomation`).validate().showErrors(res.errorsObject);
                if(res.success)notification(res.success);
                if(res.failed)notificationError(res.failed);
            }
        })
    }
}