<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Client;
use App\Models\Individuals;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //判断用户使用具有登录后的session
        $authenticate = session("email") && session("_user_info");
        
        //读取请求的地址，return cliens || inidvidual || serviceProvider
        $identify = explode('/',$request->path())[0];

        return $authenticate ? $next($request) : redirect("{$identify}/login");
    }
}
