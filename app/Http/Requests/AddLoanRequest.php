<?php

namespace App\Http\Requests;

use App\Rules\SelectRequired;
use Illuminate\Foundation\Http\FormRequest;

class AddLoanRequest extends FormRequest
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
            "loan_amount" => "required|integer",
            "repayment_period" => "required|integer",
            "purpose" => [new SelectRequired()],
        ];
    }
    public function messages()
    {
        return [
            "loan_amount.required" => "请输入",
            "loan_amount.integer" => "无效的貸款額，请输入整数",
            "repayment_period.required" => "请输入",
            "repayment_period.integer" => "无效的還款期，请输入整数",
        ];
    }
}
