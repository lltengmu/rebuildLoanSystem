<?php

namespace App\Http\Requests;

use App\Rules\SelectRequired;
use Illuminate\Foundation\Http\FormRequest;

class IndividualCreateSpRequest extends FormRequest
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
            "email" => ["required","email","unique:clients", "unique:individuals", "unique:service_providers"],
            "password" => ["required"],
            "first_name" => ["required"],
            "last_name" => ["required"],
            "mobile" => ["required","integer"],
            "contact" => ["required"],
            "company_id" => [new SelectRequired()]
        ];
    }
}
