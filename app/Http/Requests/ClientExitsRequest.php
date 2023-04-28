<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientExitsRequest extends FormRequest
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
            "HKID" => "required|unique:clients"
        ];
    }
    public function messages()
    {
        return [
            "HKID.required" => "请输入HKID",
            "HKID.unique" => "此HKID已被注册"
        ];
    }
}
