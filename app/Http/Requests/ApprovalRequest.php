<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApprovalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return session("email");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "date_of_pay" => ["required"],
            "loan_interest" => [
                "required",
                function ($attribute, $value, $fail) {
                    if (!is_int($value) && ($value > 100 || $value < 0)) {
                        $fail("请输入0～100的数字");
                    }
                }
            ],
            "case_remark" => ["required"]
        ];
    }
}
