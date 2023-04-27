<?php
namespace App\Service;
class UserService 
{
    /**
     * 登录要使用的字段
     * @return string
     */
    public function fieldName()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }
}