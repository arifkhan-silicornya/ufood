<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function adminLogin(Request $request)
    {
        $user = DB::table('admin')->where(['userName'=>$request->userID])->first();
        if($user)
        {
            if ($user->adminPass === $request->password) {
                # code...
                $username = md5('admin');
                $request->session()->put($username,$user);
                return redirect('/dashboard');
            }else{
                $request->session();
                Session::flash('error', 'Username or password not matched.!');
                Session::flash('alert', 'alert-danger');
                return redirect('/admin');
            }
        }
        else {
            # code...
            Session::flash('error', 'User Not Found');
            Session::flash('alert', 'alert-danger');
            return redirect('/admin');
        }
    }
    public function changeName(Request $request)
    {
        $data  = array();
        $data['userName'] = $request->adminName;
        DB::table('admin')->update($data);
        $request->session();
        Session::flash('error', 'Username Updated.!');
        Session::flash('alert', 'alert-success');
        return redirect('/adminProfile');

    }
    public function changePass(Request $request)
    {

        $data  = array();
        $data['adminPass'] = $request->password;

        if (DB::table('admin')->where(['adminPass'=>$request->oldPass])->first() == true) {
            if ($request->password == $request->retypePassword) {
                DB::table('admin')->update($data);
                $request->session();
                Session::flash('error', 'Password Updated.!');
                Session::flash('alert', 'alert-success');
                return redirect('/adminLogout');
            }
            else {
                $request->session();
                Session::flash('error', 'Retype Password Not Matched.!');
                Session::flash('alert', 'alert-danger');
                return redirect('/adminProfile');
            }
        }
        else {
            $request->session();
            Session::flash('error', 'old password not matched.!');
            Session::flash('alert', 'alert-danger');
            return redirect('/adminProfile');
        }


    }
    public function changeImage(Request $request)
    {
        $data = array();
        $image = $request->file('adminImage');
        $name = time().'.'.$image->getClientOriginalExtension();
        $uploads_dir = "img/Admin/";
        $moveToFolder = $image->move($uploads_dir, $name);

        $data['profilePic'] = $name;

        if ($moveToFolder == true)
        {
            if (DB::table('admin')->update($data) == true){
                return redirect('/adminProfile');
            }else {
                return redirect('/adminProfile');
            }
        }
        else {
            return redirect('/adminProfile');
        }
    }
}
