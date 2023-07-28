<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadAttachmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Boolean) session("email");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "file" => [
                "required",
                function ($attribute, $value, $fail) {
                    if (in_array(request("file")->extension(), config("system.unAllowedToUploadFiles"))) {
                        $fail("不允许上传的文件");
                    }
                }
            ]
        ];
    }
}
