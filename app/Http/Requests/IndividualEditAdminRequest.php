<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndividualEditAdminRequest extends FormRequest
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
            "email" => ["required", "email", "exists:individuals"],
            "first_name" => ["required"],
            "last_name" => ["required"],
            "mobile" => ["required", "integer"],
            "contact" => ["required"],
        ];
    }
}
