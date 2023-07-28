import $ from "jquery";
import "jquery-validation";


/**
 * 配置表单验证的默认配置项
 */
$.validator.setDefaults({ errorClass: "validateErrors" })

/**
 * 
 * @param queryElement 查询DOM的字符串
 * @param handleSubmit 自定义数据提交的回调函数
 */
export const registerFormValidation = (queryElement:string,handleSubmit:Function) => {
    $(queryElement).validate({
        submitHandler:(form,event) => handleSubmit(form,event)
    })
}

/**
 * 
 * @param queryElement 
 * @param errorMessage 
 */
export const showErrors = (queryElement:string,errorMessage:Record<string,string>) => {
    $(queryElement).validate().showErrors(errorMessage)
}