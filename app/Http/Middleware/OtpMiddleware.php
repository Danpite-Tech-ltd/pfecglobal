<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class OtpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     // role 0 = user// role 1 = manager// role 2 = admin

    public function handle(Request $request, Closure $next)
    {
        if (session::get('otpverify')){ // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return $next($request);
        }else{
            return redirect('admin/otp');
        }
    }
}