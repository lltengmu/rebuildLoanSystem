<?php

namespace App\Http\Requests;

use App\Rules\SelectRequired;
use Illuminate\Foundation\Http\FormRequest;

class IndividualCreateCaseForClient extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email" => ["required","email","unique:clients","unique:individuals","unique:service_providers"],
            "last_name" => "required",
            "first_name" =>"required",
            "appellation" => [new SelectRequired()],
            "mobile" => "required|regex:/^\d{11}$/",
            "nationality" => "required|string",
            "date_of_birth" => "required|date",
            "addressOne" => "required|string",
            "addressTwo" => "required|string",
            "unit"  => "required",
            "floor" => "required",
            "building" =>"required",
            "company_id" => [new SelectRequired()],
            "area" => [new SelectRequired()],
            "HKID" => "required|unique:clients",
            "job_status" => [new SelectRequired()],
            "salary" => "required",
            "company_name" => "required",
            "company_contact" => "required",
            "company_addres" => "required",
            "loan_amount" => "required|integer",
            "repayment_period" => "required|integer",
            "purpose" => [new SelectRequired()],
        ];
    }
    public function messages()
    {
        return [
            "email.required" =>"请输入",
            "email.email" =>"请输入合理的邮箱",
            "email.unique" =>"此邮箱已被注册",
            "last_name.required" =>"请输入",
            "first_name.required" =>"请输入",
            "mobile.required" =>"请输入",
            "mobile.regex" => "手机号码格式错误",
            "nationality.required" =>"请输入",
            "nationality.string" =>"请输入文本",
            "date_of_birth.required" =>"请选择",
            "date_of_birth.date" =>"无效的日期格式",
            "addressOne.required" =>"请输入",
            "addressOne.string" =>"请输入文本",
            "addressTwo.required" =>"请输入",
            "addressTwo.string" =>"请输入文本",
            "unit.required" =>"请输入",
            "floor.required" =>"请输入",
            "building.required" =>"请输入",
            "HKID.required" =>"请输入",
            "required.required" => "请输入",
            "HKID.unique" =>"此HKID已被注册",
            "company_name.required" =>"请输入",
            "company_contact.required" =>"请输入",
            "company_addres.required" =>"请输入",
            "loan_amount.required" =>"请输入",
            "loan_amount.integer" =>"无效的貸款額，请输入整数",
            "repayment_period.required" =>"请输入",
            "repayment_period.integer" =>"无效的還款期，请输入整数",
        ];
    }
}
