<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ValidateCodeController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',RegisterController::class);
Route::post('login',LoginController::class);
Route::post('code/guest',[ValidateCodeController::class,'guest']);
Route::put('config/{name}',[ConfigController::class,'update']);
Route::get('clients',ClientController::class);
/**
 * 资源api
 */
Route::resource('cases',CasesController::class);
