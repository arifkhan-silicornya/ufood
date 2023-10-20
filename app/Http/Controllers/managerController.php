<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\VarDumper\Cloner\Data;

class managerController extends Controller
{
    public function managerLogin(Request $request)
    {
        $user = DB::table('manager')->where(['email'=>$request->email,'active'=>1])->first();
        if($user)
        {
            if ($user->manager_password === md5($request->password)) {
                # code...
                $username = md5('manager');
                $request->session()->put($username,$user);
                return redirect('/managerDashboard');

            }else{

                $request->session();
                Session::flash('error', 'Username or password not matched.!');
                Session::flash('alert', 'alert-danger');
                return redirect('/manager');
            }
        }
        else {
            $request->session();
            Session::flash('error', 'User Not Found');
            Session::flash('alert', 'alert-danger');
            return redirect('/manager');
        }
    }

    public function profileUpdate(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $address = $request->address;
        $phone = $request->phone;
        // $NID = $request->NID;

        $data = array();

        $data['manager_name'] = $name;
        $data['phone'] = $phone;
        $data['address'] = $address;
        $data['gender'] = $gender;


        if (DB::table('manager')->where(['email'=>$email])->update($data) == true) {
            return redirect('/managerProfile');
        }
        else {
            $request->session();
            Session::flash('error', 'Profile Did Not Update');
            Session::flash('alert', 'alert-danger');
            return redirect('/managerProfile');
        }

    }
    public function pictureUpdate(Request $request)
    {
        $data = array();
        $email = $request->email;
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $uploads_dir = "img/manager/";
        $moveToFolder = $image->move($uploads_dir, $name);

        $data['profilePicture'] = $name;

        if ($moveToFolder == true)
        {
            if (DB::table('manager')->where(['email'=>$email])->update($data) == true){
                return redirect('/managerProfile');
            }else {
                return redirect('/managerProfile');
            }
        }
        else {
            return redirect('/managerProfile');
        }
    }
    public function passUpdate(Request $request)
    {
        $data = array();
        $email = $request->email;
        $oldPass = md5($request->oldPass);
        $password = md5($request->password);
        $RetypePass = md5($request->RetypePass);

        $data['manager_password'] = $password;

        if ($password == $RetypePass) {
            $pass =DB::table('manager')->where(['email'=>$email])->first();
            if ($pass == true) {
                if ($pass->manager_password == $oldPass)
                {
                    DB::table('manager')->where(['email'=>$email])->update($data);
                    return redirect('/managerLogout');
                }
                else
                {
                    $request->session();
                    Session::flash('error', 'Old Password Not Matched!');
                    Session::flash('alert', 'alert-danger');
                    return redirect('/managerProfile');
                }

            }
            else {
                $request->session();
                Session::flash('error', 'user Not Found');
                Session::flash('alert', 'alert-danger');
                return redirect('/managerProfile');
            }
        }
        else {
            $request->session();
            Session::flash('error', 'Password and confirm Pass Not matched');
            Session::flash('alert', 'alert-danger');
            return redirect('/managerProfile');
        }
    }
}
