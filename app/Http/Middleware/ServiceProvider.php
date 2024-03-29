<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ServiceProvider
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
        $identify = session("_user_info.identify"); 
        if ($identify == "sp") {
            return $next($request);
        }
        return redirect("/{$identify}/home");
    }
}
