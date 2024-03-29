<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailVerificationRequest extends FormRequest
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
        return request()->isMethod("get")
            ? []
            : ["password" => "required|confirmed",];
    }
    public function messages()
    {
        return [
            "password.required" => "请输入",
            "password.confirmed" => "两次输入不一致",
        ];
    }
}
