import path from "path";
import notification, { customAlert } from "../../plugins/notification";
import { parse, registerFormValidation, registerFunction, showErrors, url } from "../../utils"

class LoanTemplateDetail {
    protected formData = new FormData();
    protected file;
    constructor() {
        registerFunction(this.opration())
        this.register()
        this.registerUpload()
    }
    private register() {
        registerFormValidation(
            `#edit-loan-template`,
            (form, e: Event) => {
                e.preventDefault()

                let formData = new FormData();

                const id = $(form).attr("loan-template-id");

                const uploadField = document.querySelector(`#edit-loan-template input[type="file"]`) as HTMLInputElement;

                const file = uploadField.files![0];

                formData.append("file",file);

                $(`#edit-loan-template`).serializeArray().forEach((item) => {
                    formData.append(item["name"], item["value"])
                });

                $.ajax({
                    url: url(`/individual/templateManagment/edit/${id}`),
                    method: "post",
                    data: formData,
                    headers: {
                        "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                    },
                    processData: false,
                    contentType: false,
                    success: (res) => {
                        if(res.status == "success"){
                            notification(res.message)
                        }
                    },
                    error: (error) => {
                        if (error.status == 422) {
                            const errorMessages = parse(error.responseJSON.errors)

                            if (Object.keys(errorMessages).includes("file")) {
                                customAlert.error(errorMessages["file"])
                            }
                            showErrors(
                                `#edit-loan-template`,
                                errorMessages
                            )
                        }
                    }
                })
            }
        )
    }
    private opration(): Record<string, Function> {
        return {
            _uploadImage: () => $(`#edit-loan-template input[type="file"]`).click()
        }
    }
    //实现上传图片预览
    private registerUpload() {
        //注册事件
        const uploadField = document.querySelector(`#edit-loan-template input[type="file"]`) as HTMLInputElement;

        uploadField.addEventListener("change",(event: Event) => {
            let target = event.target as HTMLInputElement;
            //获取文件类型
            const type = target.value.match(/\..*/ig)![0]
            //获取文件对象
            const file = target.files![0]

            let reader = new FileReader();

            reader.onload = (e) => {
                const imageUrl = e.target?.result
                $(`#image-container`).html((index,old) =>`<img class="image" src="${imageUrl}" alt="Card image cap">` )
            }
            reader.readAsDataURL(file)
        })
    }
}

window.onload = () => new LoanTemplateDetail()