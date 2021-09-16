<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminAuth
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
        $username = md5('admin');
        if ($request->path()=="admin" && $request->session()->has($username)) {
            # code...
            return redirect('/dashboard');
        }
        if ($request->path()=="dashboard" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        if ($request->path()=="addNewItem" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        if ($request->path()=="createManager" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        if ($request->path()=="foodList" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        if ($request->path()=="adminorders" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        if ($request->path()=="adminProfile" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        if ($request->path()=="userList" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        if ($request->path()=="adminTransactionsHistory" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        if ($request->path()=="orderTransactionsHistory" && $request->session()->has($username) == null) {
            # code...
            return redirect('/admin');
        }
        return $next($request);
    }
}
