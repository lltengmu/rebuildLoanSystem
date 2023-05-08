import $ from 'jquery';
import { ajax, url } from "../../utils/index"
import "jquery-validation";



//定义业务逻辑类
export default class IndividualLogin {
    constructor() {
        this.loginFormValidate();
    }
    private loginFormValidate() {
        $.validator.setDefaults({ errorClass: "validateErrors" })
        //自定义验证规则
        $.validator.addMethod("selectRequired",function(value,element){
            return value == "0" ? false : true 
        })
        $("#register").validate({
            rules: {
                "email": {
                    required: true,
                },
                "last_name": {
                    required: true
                },
                "first_name": {
                    required: true
                },
                "appellations": {
                    selectRequired: true
                },
                "mobile": {
                    required: true
                },
                "nationality": {
                    required: true
                },
                "date_of_birth": {
                    required: true
                },
                "addressOne": {
                    required: true
                },
                "addressTwo": {
                    required: true
                },
                "unit": {
                    required: true
                },
                "floor": {
                    required: true
                },
                "building": {
                    required: true
                },
                "area": {
                    selectRequired: true
                },
                "HKID": {
                    required: true
                },
                "job_status": {
                    selectRequired: true
                },
                "company_name": {
                    required: true
                },
                "company_contact": {
                    required: true
                },
                "company_addres": {
                    required: true
                }
            },
            messages: {
                "email": {
                    required: `请输入`,
                },
                "last_name": {
                    required: `请输入`
                },
                "first_name": {
                    required: `请输入`
                },
                "appellations": {
                    selectRequired: `請選擇`
                },
                "mobile": {
                    required: `请输入`
                },
                "nationality": {
                    required: `请输入`
                },
                "date_of_birth": {
                    required: `请输入`
                },
                "addressOne": {
                    required: `请输入`
                },
                "addressTwo": {
                    required: `请输入`
                },
                "unit": {
                    required: `请输入`
                },
                "floor": {
                    required: `请输入`
                },
                "building": {
                    required: `请输入`
                },
                "area": {
                    selectRequired: `請選擇`
                },
                "HKID": {
                    required: `请输入`
                },
                "job_status": {
                    selectRequired: `請選擇`
                },
                "company_name": {
                    required: `请输入`
                },
                "company_contact": {
                    required: `请输入`
                },
                "company_addres": {
                    required: `请输入`
                }
            },
            submitHandler: async (form, event: JQueryEventObject) => {
                //组织浏览器默认提交行为
                event.preventDefault();
                //获取表单字段
                const data = $('#register').serializeArray()
                console.log($(`#agree`).val());
                //$("#login-form").validate().showErrors()
            }
        })
    }
}