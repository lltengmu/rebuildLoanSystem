<?php

namespace App\Http\Requests;

use App\Rules\ValidateCode;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'account' => $this->accountRule(),
            'password'=>['required','min:3','confirmed'],
            'code' => ['required' ,new ValidateCode()],
        ];
    }
    protected function accountRule()
    {
        if(filter_var(request('account'), FILTER_VALIDATE_EMAIL)){
            return 'required|email|unique:users,email';
        }
        //第三个验证规则的意思是：在users表中，验证 mobile 字段是唯一的,不能重复
        return ['required','regex:/^\d{11}$/','unique:users,mobile'];
    }
    public function messages()
    {
        return [
            'code.required' => "验证码不能为空"
        ];
    }
}
