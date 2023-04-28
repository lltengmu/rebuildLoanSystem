<?php

use App\Http\Controllers\Individual\Dashboard;
use App\Http\Controllers\Individual\LoanApplication;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//登录前接口
Route::match(['get', 'post'], '{identify}/login', LoginController::class);
//资源接口
Route::resource('cases',CasesController::class);

//登录后接口
Route::middleware(['auth'])->group(function () {
    //定义individual 路由前缀
    Route::prefix('individual')->group(function () {
        //定义首页路由及api接口
        Route::prefix("/home")->group(function(){
            Route::get('/',[Dashboard::class,'index']);
            Route::get('/cards',[Dashboard::class,'cards']);
            Route::post('/filterCards',[Dashboard::class,'filterCards']);
            Route::get('/LineChart',[Dashboard::class,'LineChart']);
            Route::get('/pieChart',[Dashboard::class,'pieChart']);
        });
        //定义贷款申请页面路由
        Route::prefix('/loanApplication')->group(function(){
            Route::get("/",[LoanApplication::class,"index"]);
            Route::post("/cases",[LoanApplication::class,"cases"]);
            Route::get("/export/{id}",[LoanApplication::class,"exportCaseItem"]);
            Route::get("/exportAll",[LoanApplication::class,"exportAll"]);
        });
    });
});
