<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Config;
use App\Observers\ClientsObserver;
use App\Service\CaptchaService;
use App\Service\CodeService;
use App\Service\SmsService;
use App\Service\UploadService;
use App\Service\UtilsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //注册验证码服务
        $this->app->instance('code',new CodeService());
        //注册短信服务
        $this->app->instance('sms',new SmsService);
        //注册文件上传服务
        $this->app->instance('upload', new UploadService);
        //注册工具助手服务
        $this->app->instance("utils",new UtilsService);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //注册观察者
        Client::observe(ClientsObserver::class);
        //$config = Config::firstOrNew();
        //config(['hd' => $config->toArray()]);
    }
}
