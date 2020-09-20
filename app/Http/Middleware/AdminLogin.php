<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Admin;


class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('admin')->check()){
            $nhanvien = Auth::guard('admin')->user();
            if ($nhanvien->access ==='1'){
                return $next($request);
            }
            return redirect('admin/customer')->with('error' ,' bạn chưa có quyền');
        }
        else {
            return redirect('admin/login');
        }
    }
}
