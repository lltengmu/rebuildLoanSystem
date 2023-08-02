<?php

namespace App\Providers;

use App\Models\Attachment;
use App\Models\Cases;
use App\Models\Client;
use App\Models\Individuals;
use App\Models\ServiceProvider as ModelsServiceProvider;
use App\Observers\AttachmentObserver;
use App\Observers\CasesObserver;
use App\Observers\ClientsObserver;
use App\Observers\IndividualObserver;
use App\Observers\ServiceProviderObserver;
use App\Service\EmailService;
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
        //注册文件上传服务
        $this->app->instance('upload', new UploadService);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //注册工具助手服务
        $this->app->bind("utils",function($app){
            return new UtilsService();
        });
        //定义client观察者
        Client::observe(ClientsObserver::class);
        //定义case 观察者
        Cases::observe(CasesObserver::class);
        //定义individual观察者
        Individuals::observe(IndividualObserver::class);
        //定义sp观察者
        ModelsServiceProvider::observe(ServiceProviderObserver::class);
        //定义附件观察者
        Attachment::observe(AttachmentObserver::class);
    }
}
