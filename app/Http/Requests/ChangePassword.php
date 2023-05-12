<?php

namespace App\Http\Requests;

use App\Rules\CheckOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            "password" => "required|min:3|confirmed",
            "password_confirmation" => "required",
            "old-password" => ["required",new CheckOldPassword],
        ];
    }
    public function messages()
    {
        return [
            "old-password.required" => "请输入",
            "password.required" => "请输入", 
            "password.min" => "密码最小输入3个字符", 
            "password_confirmation.required" => "请输入",
            "password.confirmed" => "新密码与确认密码不一致", 
        ];
    }
}
