<?php
namespace App\Service;

use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

class CodeService 
{
    /**
     * 统一发送的接口
     */
    public function send(string $account)
    {
        //获取登录方式( 邮箱|手机号 )
        $action = filter_var($account,FILTER_VALIDATE_EMAIL) ? 'email':'mobile';
        //获取缓存，通知缓存存在则抛出 Http 异常
        if(Cache::get($account)) abort(403,"验证码已发送");
        //没有缓存则发送邮件
        return $this->$action($account);
    }

    /**
     * 邮箱验证码
     * @return void
     */
    public function email(string $email):int
    {   
        //在数据库创建一个用户
        $user = User::factory()->make(['email' =>$email]);
        //向用户发送邮件
        Notification::send($user,new EmailValidateCodeNotification($code = $this->getCode()));
        //缓存验证码 
        Cache::put($email,$code,config('app.code_expire_time'));
        //返回验证码
        return $code;
    }

    /**
     * 手机发送验证码
     * @return void
     */
    protected function mobile($phone)
    {
        app('sms')->send($phone,'SMS_154950909',[
            'code' =>$code = $this->getCode()
        ]);
        return $code;
    }

    /**
     * 生成验证码
     * 
     */
    protected function getCode():int
    {
        return mt_rand(1000,9999);
    }

    /**
     * 验证码校对
     * 
     */
    public function check($account,$code):bool
    {
        return Cache::get($account) == $code;
    }
    
    /**
     * 清除验证码缓存
     */
    public function clear($account):void
    {
        Cache::forget($account);
    }
}