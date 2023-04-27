<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * 根据请求方式决定是否对请求进行验证
     *
     * @return array
     */
    public function rules()
    {
        return $this->decideRequestMethod();
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
    /**
     * 根据请求方式决定是否返回验证规则
     */
    public function decideRequestMethod():array
    {
        $validateArray = [
            'email' => ['required','email',$this->userIdentify(request()->_identify)],
            'password' => 'required|min:5',
            'captcha' => "required|captcha",
        ];
        return request()->isMethod('get') ? [] : $validateArray;
    }
    private function userIdentify($identify){
        switch($identify){
            case "individual":
                return "exists:individuals";
                break;
            case "clients":
                return "exists:clients";
                break;
            case "serviceProvider":
                return "exists:service_providers";
                break;
        }
    }
}
