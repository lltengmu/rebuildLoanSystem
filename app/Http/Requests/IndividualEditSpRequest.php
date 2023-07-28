<?php

namespace App\Http\Requests;

use App\Rules\SelectRequired;
use Illuminate\Foundation\Http\FormRequest;

class IndividualEditSpRequest extends FormRequest
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
            "email" => ["required","email", "exists:service_providers"],
            "first_name" => ["required"],
            "last_name" => ["required"],
            "mobile" => ["required","integer"],
            "contact" => ["required"],
            "company_id" => [new SelectRequired]
        ];
    }
}
