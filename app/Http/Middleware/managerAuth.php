<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class managerAuth
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
        $username = md5('manager');
        if ($request->path()=="manager" && $request->session()->has($username)) {
            # code...
            return redirect('/managerDashboard');
        }
        if ($request->path()=="managerDashboard" && $request->session()->has($username) == null) {
            # code...
            return redirect('/manager');
        }
        if ($request->path()=="managerOrders" && $request->session()->has($username) == null) {
            # code...
            return redirect('/manager');
        }
        if ($request->path()=="managerProfile" && $request->session()->has($username) == null) {
            # code...
            return redirect('/manager');
        }
        if ($request->path()=="managerUserList" && $request->session()->has($username) == null) {
            # code...
            return redirect('/manager');
        }
        if ($request->path()=="managerFoodList" && $request->session()->has($username) == null) {
            # code...
            return redirect('/manager');
        }
        if ($request->path()=="managerAddNewItem" && $request->session()->has($username) == null) {
            # code...
            return redirect('/manager');
        }
        if ($request->path()=="managerTransactionsHistory" && $request->session()->has($username) == null) {
            # code...
            return redirect('/manager');
        }
        if ($request->path()=="managerOrderTransactionsHistory" && $request->session()->has($username) == null) {
            # code...
            return redirect('/manager');
        }
        return $next($request);
    }
}
