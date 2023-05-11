<?php

namespace App\Http\Requests;

use App\Rules\SelectRequired;
use Illuminate\Foundation\Http\FormRequest;

class ClientEditProfileRequest extends FormRequest
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
            "appellations" => [new SelectRequired()],
            "mobile" => "required|regex:/^\d{11}$/",
            "nationality" => "required|string",
            "date_of_birth" => "required|date",
            "addressOne" => "required|string",
            "addressTwo" => "required|string",
            "unit"  => "required",
            "floor" => "required",
            "building" => "required",
            "area" => [new SelectRequired()],
            "job_status" => [new SelectRequired()],
            "salary" => "required",
            "company_name" => "required",
            "company_contact" => "required",
            "company_addres" => "required",
        ];
    }
    public function messages()
    {
        return [
            "mobile.required" => "请输入",
            "mobile.regex" => "手机号码格式错误",
            "nationality.required" => "请输入",
            "nationality.string" => "请输入文本",
            "date_of_birth.required" => "请选择",
            "date_of_birth.date" => "无效的日期格式",
            "addressOne.required" => "请输入",
            "addressOne.string" => "请输入文本",
            "addressTwo.required" => "请输入",
            "addressTwo.string" => "请输入文本",
            "unit.required" => "请输入",
            "floor.required" => "请输入",
            "building.required" => "请输入",
            "required.required" => "请输入",
            "company_name.required" => "请输入",
            "company_contact.required" => "请输入",
            "company_addres.required" => "请输入"
        ];
    }
}
