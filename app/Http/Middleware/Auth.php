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
        //读取session 因为登录后具有以下 session 中的一种
        $individual = Individuals::where('email', session()->get('email'))->first();
        $client = Client::where('email', session()->get('email'))->first();
        $serviceProvider = ServiceProvider::where('email', session()->get('email'))->first();
        
        //读取请求的地址，return cliens || inidvidual || serviceProvider
        $identify = explode('/',$request->path())[0];
        //是否存在
        $exits = $serviceProvider || $individual || $client;
        //如果存在，则接受请求，不存在则重定向到登录页面
        return $exits ? $next($request) : redirect("{$identify}/login");
    }
}
