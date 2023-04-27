<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCodeRequest extends FormRequest
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
        ];
    }
    protected function accountRule()
    {
        if(filter_var(request('account'), FILTER_VALIDATE_EMAIL)){
            return 'required|email';
        }
        //第三个验证规则的意思是：在users表中，验证 mobile 字段是唯一的,不能重复
        return ['required','regex:/^\d{11}$/'];
    }
}
