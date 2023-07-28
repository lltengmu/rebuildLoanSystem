import $ from "jquery";
import { loading, url, ajax, registerFormValidation, showErrors, parse } from "../../utils";
import notification, { notificationError } from "../../plugins/notification";

export default class FormSubmit {
    constructor(public dataTableInstance) {
        this.registerFormSubmit()
    }
    private registerFormSubmit() {
        registerFormValidation(
            `#IndividualCreateClient`,
            (form, event) => {
                event.preventDefault();
                console.log($(`#IndividualCreateClient`).serializeArray());
                $.ajax({
                    url: url(`/individual/clientsManagment/add-client`),
                    method: "post",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data: $(`#IndividualCreateClient`).serializeArray(),
                    success: (res) => {
                        if (res.status == "success") {
                            $(`#IndividualCreatedClient #cancel`).click();
                            this.dataTableInstance.ajax.reload();
                            notification(res.message);
                        }
                    },
                    error: (error) => {
                        if (error.status == 422) {
                            showErrors(
                                `#IndividualCreateClient`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    }
                })
            }
        )
    }
}