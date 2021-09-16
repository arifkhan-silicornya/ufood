<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class userAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $username = md5('ufoodUser');
        if ($request->path()=="login" && $request->session()->has($username)) {
            # code...
            return redirect('/');
        }
        if ($request->path()=="/" && $request->session()->missing($username)) {
            # code...
            return redirect('/login');
        }


        return $next($request);
    }
}
