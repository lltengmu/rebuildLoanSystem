<?php

namespace App\Http\Requests;

use App\Models\Client;
use App\Models\Individuals;
use App\Models\ServiceProvider;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * 定义验证规则
     * @return array
     */
    public function rules()
    {
        return request()->isMethod('get') ? [] : [
            'email' => [
                'required',
                'email',
                $this->userIdentify(request()->_identify),
            ],
            'password' => [
                "required",
                "min:5",
            ],
            'captcha' => "required|captcha",
        ];
    }
    /**
     * 自定义验证错误信息
     *  @test
     */
    public function messages()
    {
        return [
            'email.required' => '電子郵件欄位是必填的',
            'password.required' => '密碼欄位是必填的',
            'email.email' => '電子郵件欄位格式錯誤',
            'captcha.required' => '驗證碼欄位是必填的',
            'captcha.captcha' => '驗證碼错误',
        ];
    }
    private function userIdentify($identify)
    {
        switch ($identify) {
            case "individual":
                return "exists:individuals";
            case "clients":
                return "exists:clients";
            case "serviceProvider":
                return "exists:service_providers";
        }
    }
}
