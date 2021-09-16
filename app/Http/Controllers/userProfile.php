<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class userProfile extends Controller
{
    function profileUPdate(Request $request)
    {
        $data=array();
        $data['name'] = $request->name;
        $data['gender'] = $request->gender;
        $data['usertype'] = $request->userType;
        $data['department'] = $request->department;
        $data['batch'] = $request->batch;
        $data['address'] = $request->deliveryAddress;
        $data['contact'] = $request->contact;

        if(DB::table('users')->where(['email'=>$request->email])->update($data))
        {
            $request->session();
            Session::flash('error', 'Profile Update');
            Session::flash('alert', 'alert-success');
            return view('profile');
        }
        else {
            $request->session();
            Session::flash('error', 'Profile Not Update. Try Again!');
            Session::flash('alert', 'alert-danger');
            return redirect('/profile');
        }


    }
    function image(Request $request)
    {
        $image = $request->file('profilePicture');
        $name = time().'.'.$image->getClientOriginalExtension();
        $uploads_dir = "img/user/picture/";
        $moveToFolder = $image->move($uploads_dir, $name);

        $data['profilePic'] = $name;

        if ($moveToFolder ==true)
        {
            if (DB::table('users')->where(['email'=>$request->email])->update($data) == true){
                return redirect('/profile');
            }else {
                return redirect('/profile');
            }
        }
        else {
            return redirect('/profile');
        }
    }
}
