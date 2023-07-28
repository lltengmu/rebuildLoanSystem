import { url } from "../../utils";
import notification, { customAlert } from "../../plugins/notification";

class Template{
    constructor(){
        this.registerUpload()
        this.registerEvent()
    }
    private registerEvent(){
        const el = document.querySelector(`#upload-image`) as HTMLButtonElement
        el.addEventListener("click",() =>{
            $(`#uploadFile`).click()
        })
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
                    if(res.status == "success"){
                        $(`#renderImage`).html((index,old) => res.data.imageUrl)
                    }
                },
                error: (error) => console.log(error)
            })
        })
    }
}
window.onload = () =>{
    new Template()
};