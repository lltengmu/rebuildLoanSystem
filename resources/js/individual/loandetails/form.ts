import $ from "jquery";
import { ajax, loading, parse, showErrors, url } from "../../utils";
import notification, { notificationError } from "../../plugins/notification";
import "jquery-validation";

export default class IndividualViewLoanDetails {
    constructor() {
        $.validator.setDefaults({ errorClass: "validateErrors" })
        this.registerForm()
    }
    private registerForm() {
        const id = window.location.href.split("/").reverse()[0];
        $(`#edit`).validate({
            submitHandler: (form, event: JQueryEventObject) => {

                event.preventDefault();

                $.ajax({
                    url: url(`/individual/loanApplication/edit/${id}`),
                    method: "post",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data: $(`#edit`).serializeArray(),
                    success: (res) => {
                        console.log(res);
                        if (res.status == "success") {
                            notification(res.message)
                        }
                    },
                    error: (error) => {
                        if (error.status == 422) {
                            showErrors(
                                `#edit`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    },
                })
            }
        })
    }
}