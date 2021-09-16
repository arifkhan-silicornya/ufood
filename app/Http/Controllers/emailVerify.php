<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class emailVerify extends Controller
{

    public function verify(Request $request){

        $date = Carbon::now()->format('Y-m-d H:i:s');

        //Get date and time


        $data=array();
        $data['verified'] = 0;
        $data['email_verified_at'] = $date;

        $request->mail;
        $request->token;

        $update = DB::table('users')->where(['email'=>$request->mail])->update($data);

        if ($update == true) {
            $request->session();
            Session::flash('error', 'Verification Confirm. Login Now!');
            Session::flash('alert', 'alert-success');
            return redirect('/login');
        }
        else {
            $request->session();
            Session::flash('error', 'Something Wrong. Try Again!');
            Session::flash('alert', 'alert-danger');
            return view('login');
        }


    }
}


