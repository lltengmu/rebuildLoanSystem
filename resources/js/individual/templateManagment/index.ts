import { registerFunction, url } from "../../utils";
import notification, { customAlert } from "../../plugins/notification";

class Template {
    constructor() {
        this.registerUpload()
        registerFunction(this.oprate())
    }
    private registerUpload() {
        //注册事件
        const uploadField = document.querySelector(`#uploadFile`) as HTMLInputElement;
        uploadField.addEventListener("change", async (event: Event) => {
            let target = event.target as HTMLInputElement;
            //获取文件类型
            const type = target.value.match(/\..*/ig)![0]
            //获取文件对象
            const file = target.files![0]
            let formData = new FormData();
            formData.append("file", file);
            //发送请求
            $.ajax({
                url: url(`/animated-images`),
                method: "post",
                data: formData,
                headers: {
                    "X-CSRF-token": (document.querySelector(`meta[name="csrf-token"]`) as HTMLMetaElement).content,
                },
                processData: false,
                contentType: false,
                success: (res) => {
                    console.log(res)
                    if (res.status == "success") {
                        $(`#renderImage`).html((index, old) => res.data.imageUrl)
                    }
                },
                error: (error) => console.log(error)
            })
        })
    }
    //定义页面事件
    private oprate(): Record<string, Function> {
        return {
            _setupTemplateContent: (dom: HTMLButtonElement) => {
                const id = $(dom).attr("loan-template")
                window.location.href = url(`/individual/templateManagment/detail/${id}`)
            }
        }
    }
}
window.onload = () => {
    new Template()
};