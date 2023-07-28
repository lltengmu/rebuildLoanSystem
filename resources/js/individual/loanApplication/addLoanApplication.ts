import $, { error } from 'jquery';
import "jquery-validation";
import { loading, url, ajax, showErrors, parse } from "../../utils";
import notification, { notificationError } from "../../plugins/notification";
export default class AddLoanApplication {
    private HKID;
    constructor(public table) {
        $.validator.setDefaults({ errorClass: "validateErrors" })
        this.registerQueryListener();
        this.registerFormSubmit()
    }
    private registerQueryListener() {
        $("#query").validate({
            rules: {
                "HKID": { required: true }
            },
            messages: {
                "HKID": {
                    required: "请输入HKID"
                }
            },
            errorPlacement: function (error, element) {
                //自定义错误信息的显示位置
                const el = $("#query")
                error.appendTo(el)
            },
            submitHandler: (form, event: JQueryEventObject) => {
                event.preventDefault();
                //把HKID 存储起来
                $(`#query`).serializeArray().forEach((item) => {
                    if (item.name == "HKID") this.HKID = item.value
                })
                $.ajax({
                    url: url(`/individual/loanApplication/exits`),
                    method: "post",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data: $(`#query`).serializeArray(),
                    success: (res) => {
                        if (res.status == "success") this.toStepTwo()
                    },
                    error: (error) => {
                        if (error.status == 422) {
                            showErrors(
                                `#query`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    }
                })
            }
        });
    }
    private toStepTwo() {
        const tablist = document.querySelectorAll(".tabcontent-border > div");
        const model = document.querySelector(`#queryModalCenter .modal-dialog`) as HTMLDivElement
        tablist.forEach((item) => {
            if (Array.from(item.classList).includes("show") && Array.from(item.classList).includes("active")) {
                item.classList.remove("show")
                item.classList.remove("active")
            };
        })
        tablist[1].classList.add("show");
        tablist[1].classList.add("active");
        model.style.maxWidth = "70vw"
        $(`input[name="HKID"]`).val(this.HKID)
        $("#addLoanApplication").validate().showErrors({ HKID: "沒有此用戶，請爲新用戶創建貸款" })
    }
    /**
     *  add loan application form submit function
     */
    private registerFormSubmit() {
        $(`#addLoanApplication`).validate({
            submitHandler: (form, event: JQueryEventObject) => {
                event.preventDefault();
                $.ajax({
                    url: url(`/individual/loanApplication/add`),
                    method: "post",
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    data: $(`#addLoanApplication`).serializeArray(),
                    success: (res) => {
                        if (res.status == "success") {
                            $(`#queryModalCenter button[id="cancel"]`).click();
                            this.table.tableInstance.ajax.reload();
                            notification(res.message)
                        }
                    },
                    error: (error) => {
                        if (error.status == 422) {
                            showErrors(
                                `#addLoanApplication`,
                                parse(error.responseJSON.errors)
                            )
                        }
                    }
                })
            }
        })
    }
}