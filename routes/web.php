<?php

use App\Http\Controllers\Individual\Dashboard;
use App\Http\Controllers\Individual\LoanApplication;
use App\Http\Controllers\Resources\CasesController;
use App\Http\Controllers\Basic\LoginController;
use App\Http\Controllers\individual\ApprovalManagment;
use App\Http\Controllers\individual\ClientManagment;
use App\Http\Controllers\Resources\ClientsController;
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

//登录后接口
Route::middleware(['auth'])->group(function () {
    //资源接口
    Route::resource('cases',CasesController::class);
    Route::resource('clients',ClientsController::class);
    //公共路由
    Route::get("/details/{id}",[CasesController::class,"loanApplicationDetail"]);
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
            Route::post("/exits",[LoanApplication::class,"clientExits"]);
            Route::post("/uploadExcel",[LoanApplication::class,"uploadExcel"]);
        });
        //定义贷款申请页面路由
        Route::prefix('/approvalManagment')->group(function(){
            Route::get("/",[ApprovalManagment::class,"index"]);
            Route::post("/cases",[ApprovalManagment::class,"cases"]);
            Route::get("/details/{id}",[ApprovalManagment::class,"details"]);
        });
        //定义客户管理页面路由
        Route::prefix('/clientsManagment')->group(function(){
            Route::get("/",[ClientManagment::class,"index"]);
            Route::get("/details/{id}",[ClientManagment::class,"details"]);
        });
    });

});
