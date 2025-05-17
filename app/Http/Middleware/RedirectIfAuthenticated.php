<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == 'admin' && Auth::guard($guard)->check()){
            return redirect()->route('admin.home');
        }
        if ($guard == 'web' && Auth::guard($guard)->check()){
            return redirect()->route('user.business');
        }

       if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if($user->is_member == 'yes' && $user->first_login == 'yes'){
                
                return redirect('/user-home/reset-password');
            }else{
          
            return redirect('/user-home/business');
            }
            
        }

        return $next($request);
    }
}
