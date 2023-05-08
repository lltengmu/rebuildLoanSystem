<?php


use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Basic\LoginController;
use App\Http\Controllers\Client\LoanApplication as ClientLoanApplication;
use App\Http\Controllers\Client\LoanApplicationDetail;
use App\Http\Controllers\Client\Profile;
use App\Http\Controllers\Common\Form;
use App\Http\Controllers\Individual\Dashboard;
use App\Http\Controllers\Individual\LoanApplication;
use App\Http\Controllers\Individual\ApprovalManagment;
use App\Http\Controllers\Individual\ClientManagment;
use App\Http\Controllers\Individual\ServiceProvider;
use App\Http\Controllers\Individual\IndividualManagement;
use App\Http\Controllers\Resources\CasesController;
use App\Http\Controllers\Resources\ClientsController;
use App\Http\Controllers\Resources\IndividualController;
use App\Http\Controllers\Resources\ServiceProvide;
use App\Notifications\EmailValidateCodeNotification;

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
//form
Route::match(["get","post"],"/new-loanApplication",[Form::class,"index"]);
//登录后接口
Route::middleware(['auth'])->group(function () {
    //资源接口
    Route::resource('cases',CasesController::class);
    Route::resource('clientsResource',ClientsController::class);
    Route::resource('serviceProvider',ServiceProvide::class);
    //这里不能使用individual，与下面路由冲突，所以使用admin
    Route::resource('admin',IndividualController::class);
    //公共路由
    Route::get("/details/{id}",[CasesController::class,"loanApplicationDetail"]);
    //定义individual 路由前缀
    Route::prefix('/individual')->group(function () {
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
            Route::get("/export/{id}",[CasesController::class,"exportCaseItem"]);
            Route::get("/exportAll",[CasesController::class,"exportAll"]);
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
            Route::get("/exportAll",[ClientsController::class,"exportAll"]);
            Route::get("/export/{id}",[ClientsController::class,"exportClientInformation"]);
        });
        //定义服务提供商管理页面路由
        Route::prefix('/serviceProviderManagement')->group(function(){
            Route::get("/",[ServiceProvider::class,"index"]);
            Route::get("/details/{id}",[ServiceProvider::class,"details"]);
        });
        //定义用户管理页面路由
        Route::prefix('/individualManagement')->group(function(){
            Route::get("/",[IndividualManagement::class,"index"]);
            Route::get("/details/{id}",[IndividualManagement::class,"details"]);
        });
    });
    Route::prefix("/clients")->group(function(){
        Route::prefix('/home')->group(function(){
            Route::get("/",[ClientLoanApplication::class,"index"]);
            Route::get("/loan-details",[ClientLoanApplication::class,"loanDetails"]);
            Route::get("/cases",[ClientLoanApplication::class,"cases"]);
            Route::post("/edit/{id}",[ClientLoanApplication::class,"edit"]);
        });
        Route::prefix('/LoanApplicationDetail')->group(function(){
            Route::get("/",[LoanApplicationDetail::class,"index"]);
        });
        Route::prefix('/profile')->group(function(){
            Route::get("/",[Profile::class,"index"]);
        });
    });
});
