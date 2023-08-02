<?php

namespace App\Service;

use App\Models\Client;
use App\Models\Individuals;
use App\Models\NotificationTemplates;
use App\Models\ServiceProvider;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class EmailService
{
    //统一发送的接口
    public function send(Client $user,string $category): void
    {
        $data = $this->analyzingScenarios($category,$user);
        //向用户发送邮件
        env("ENABLE_EMAIL_SERVICE") && Notification::send($user, new EmailNotification($data["title"], $data["content"], $data["url"],$data["showButton"]));
    }
    //获取标题
    public function title(string $template, string $first_name, string $last_name): string
    {
        //如果模板标题中包含first_name 和 last_name 变量,则替换内容
        if (preg_match('/\[first_name\]/', $template) && preg_match('/\[last_name\]/', $template)) {
            //替换first_name
            $stepOne = preg_replace('/\[first_name\]/', $first_name, $template);
            //替换last_name 并把新的字符串返回
            return preg_replace('/\[last_name\]/', $last_name, $stepOne);
        }
        //否则返回原标题内容
        return $template;
    }
    //获取内容
    public function content(string $template, string $first_name, string $last_name): string
    {
        //如果模板中包含first_name 和 last_name 变量,则替换内容
        if (preg_match('/\[first_name\]/', $template) && preg_match('/\[last_name\]/', $template)) {
            //替换first_name
            $stepOne = preg_replace('/\[first_name\]/', $first_name, $template);
            //替换last_name 并把新的字符串返回
            return preg_replace('/\[last_name\]/', $last_name, $stepOne);
        }
        //否则返回原模版内容
        return $template;
    }
    //根据场景返回不同的内容
    public function analyzingScenarios($category, $user)
    {
        //获取email模板
        $template = NotificationTemplates::where("category", $category)->first()->toArray();
        //处理标题
        $title = $this->title($template["title"], $user->first_name, $user->last_name);
        //填充内容
        $content = $template["content"];
        //处理url
        $url = url("/verification/{$user->sys_id}");
        //返回处理结果
        switch ($category):
            case "client_create":
                return [
                    "title" => $title,
                    "content" => $content,
                    "url" => $url,
                    "showButton" => false
                ];
            case "admin_add_loan":
                return [
                    "title" => $title,
                    "content" => $content,
                    "url" => $url,
                    "showButton" => false
                ];
            case "agreed_loan":
                return [
                    "title" => $title,
                    "content" => $content,
                    "url" => $url,
                    "showButton" => false
                ];
        endswitch;
    }
}
