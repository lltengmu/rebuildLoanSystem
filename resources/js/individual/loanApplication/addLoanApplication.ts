import $, { error } from 'jquery';
import "jquery-validation";
import { loading, url, ajax } from "../../utils";
export default class AddLoanApplication {
    private HKID;
    constructor() {
        this.registerQueryListener();
    }
    private registerQueryListener() {
        $.validator.setDefaults({ errorClass: "validateErrors" })
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
            submitHandler: async (form, event: JQueryEventObject) => {
                event.preventDefault();
                //把HKID 存储起来
                $(`#query`).serializeArray().forEach((item) => {
                    if (item.name == "HKID") this.HKID = item.value
                })
                //发起请求
                const res = await ajax({
                    url: url("/individual/loanApplication/exits"),
                    method: "post",
                    data: $(`#query`).serializeArray(),
                }) as response
                if (res.errorsObject && !res.success) $("#query").validate().showErrors(res.errorsObject)
                else this.toStepTwo();
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
        $("#addLoanApplication").validate().showErrors({HKID:"沒有此用戶，請爲新用戶創建貸款"})
    }
    /**
     *  add loan application form submit function
     */
    private registerFormSubmit() { }
}