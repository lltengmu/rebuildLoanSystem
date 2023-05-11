<?php
namespace App\Service;

use App\Models\Client;
use App\Models\NotificationTemplates;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class EmailService 
{
    /**
     * 统一发送的接口
     */
    public function send(string $email,string $category):void
    {
        //获取用户
        $user = Client::where("email",$email)->first();
        //获取email模板
        $template = NotificationTemplates::where("category",$category)->first()->toArray();
        //处理标题
        $title = $this->name($template["title"],$user->first_name,$user->last_name);
        //填充内容
        $content = $template["content"];
        //处理url
        $url = url("/verification/{$user->sys_id}");
        //向用户发送邮件
        env("ENABLE_EMAIL_SERVICE") && Notification::send($user,new EmailNotification($title,$content,$url));
    }
    /**
     * get title
     */
    public function name(string $template,string $first_name ,string $last_name):string
    {
        //替换first_name
        $stepOne = preg_replace('/\[first_name\]/',$first_name,$template);
        //替换last_name 并把新的字符串返回
        return preg_replace('/\[last_name\]/',$last_name,$stepOne);
    }
}