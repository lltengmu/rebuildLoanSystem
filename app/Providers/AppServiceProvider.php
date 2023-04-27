<?php

namespace App\Providers;

use App\Models\Config;
use App\Service\CaptchaService;
use App\Service\CodeService;
use App\Service\SmsService;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$config = Config::firstOrNew();
        //config(['hd' => $config->toArray()]);
    }
}
