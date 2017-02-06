<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
        if (Auth::guard($guard)->guest()) {

            if ($request->ajax() || $request->wantsJson()) {
            var_dump($request);$this->debug_exit(__FILE__,__LINE__,1);
                return response('Unauthorized.', 401);
            } else {
            //var_dump($request);$this->debug_exit(__FILE__,__LINE__,1);
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }

        public function debug_exit($file,$line,$exit=1) {
        echo ""."in ".substr($file,strripos ($file , "/")+1)." on line **".$line." ";
        if ($exit){
            exit(" exiting");
        }
    }


}
