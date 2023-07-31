<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoanTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (bool) session("email");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => ["required"],
            "template_text" => ["required"],
            "status" => ["required"],
            "file" => [
                function ($attribute, $value, $fail) {
                    if ($value !="undefined" && !in_array(request("file")->extension(), config("system.allowedImagesType"))) {
                        $fail("不允许上传的文件类型");
                    }
                }
            ]
        ];
    }
}
