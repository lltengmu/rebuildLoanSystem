<?php

namespace App\Http\Requests;

use App\Rules\SelectRequired;
use Illuminate\Foundation\Http\FormRequest;

class IndividualApprovalEdit extends FormRequest
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
            "appellation" => [new SelectRequired],
            "area" => [new SelectRequired],
            "job_status" => [new SelectRequired],
            "purpose" => [new SelectRequired],
            "case_remark" => "required"
        ];
    }
    public function messages()
    {
        return [
            "case_remark.required" => "请输入"
        ];
    }
}
