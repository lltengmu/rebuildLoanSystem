<?php

namespace App\Providers;

use App\Models\Cases;
use App\Models\Client;
use App\Models\Config;
use App\Models\Individuals;
use App\Models\ServiceProvider as ModelsServiceProvider;
use App\Observers\CaseObserver;
use App\Observers\ClientsObserver;
use App\Observers\IndividualObserver;
use App\Observers\ServiceProviderObserver;
use App\Service\CaptchaService;
use App\Service\EmailService;
use App\Service\SmsService;
use App\Service\UploadService;
use App\Service\UtilsService;
use Illuminate\Support\ServiceProvider;
use Individual;

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
        $this->app->instance('email',new EmailService);
        //注册短信服务
        $this->app->instance('sms',new SmsService);
        //注册文件上传服务
        $this->app->instance('upload', new UploadService);
        //注册工具助手服务
        $this->app->instance("utils",new UtilsService());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app("utils")->init();
        //注册观察者
        Client::observe(ClientsObserver::class);
        Cases::observe(CaseObserver::class);
        ModelsServiceProvider::observe(ServiceProviderObserver::class);
        Individuals::observe(IndividualObserver::class);
    }
}
