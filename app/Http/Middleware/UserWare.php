<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UserWare
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
        // $link = "http://127.0.0.1:8000/uploads/";
        // if(strpos($request->url(),$link) !== false)
        // {
        // echo $request->url();
        // exit();
        // }
        // exit();
        if(Auth::check() && Auth::user()->role == 3){
            return $next($request);
            }
            else 
            {
                return redirect('/login');
            }
    }
}
