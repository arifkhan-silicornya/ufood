<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\verificationMail;


class userController extends Controller
{
    //
    function login(Request $req)
    {
        $reqPassword = md5($req->password);
        $user = User::where(['studentid'=>$req->userID])->first();
        $verifiedUser = User::where(['studentid'=>$req->userID,'verified'=>1])->first();
        if ($verifiedUser) {
            $req->session();
            Session::flash('error', 'User Not Verified. Please, Cheack Your E-mail Address!');
            Session::flash('alert', 'alert-danger');
            return view('login');
        }
        else {

            if($user)
            {
                if ($user->password === $reqPassword) {
                    # code...
                    $username = md5('ufoodUser');
                    $req->session()->put($username,$user);

                    return redirect('/');
                }else{
                    $req->session();
                    Session::flash('error', 'Username or password not matched.!');
                    Session::flash('alert', 'alert-danger');
                    return view('login');
                }
            }
            else {
                # code...
                $req->session();
                Session::flash('error', 'User Not Found');
                Session::flash('alert', 'alert-danger');
                return view('login');
            }
        }
    }

    function signup(Request $request)
    {

        $data=array();
        $data['name'] = $request->fullName;
        $data['instituteName'] = $request->instituteName;
        $data['studentid'] = $request->versityID;
        $data['email'] = $request->email;
        $data['contact'] = $request->contactNo;
        $data['password'] = md5($request->password);

        $token = csrf_token();
        $userMail = $request->email;

        $data['remember_token'] = $token;

        $account = array();
        $account['name'] = $request->fullName;
        $account['user_id'] = $request->versityID;

        if ($request->password == $request->retypePass) {
            # code...

            if (User::where(['studentid'=>$request->versityID])->first() == false || User::where(['email'=>$userMail])->first() == false) {
                # code...
                $details = [
                    'title' => 'Click this link to verify your UFood account',
                    'body' => "http://127.0.0.1:8000/verifyuserAccount?mail=$userMail&token=$token",
                ];

                Mail::to($userMail)->send(new verificationMail($details)) ;

                    DB::table('users')->insert($data);
                    DB::table('user_account')->insert($account);

                    $request->session();
                    Session::flash('error', 'A mail sent to your email address. Verify First!');
                    Session::flash('alert', 'alert-success');
                    return view('login');



            }
            else {
                # code...

                $request->session();
                Session::flash('error', 'UserID or Email already used.!');
                Session::flash('alert', 'alert-danger');
                return view('register');
            }
        }
        else {

            // $request->session()->flash('error', 'Retype password not matched.!');

            $request->session();
            Session::flash('error', 'Retype password not matched.!');
            Session::flash('alert', 'alert-danger');
            return view('register');

        }
        // return $req->input();
    }
    function recoverMail(Request $request)
    {
        if (User::where(['email'=>$request->userMail])->first() == true) {

            $userMail = $request->userMail;

            $details = [
                'title' => 'Click this link to Reset your Pasword',
                'body' => "http://127.0.0.1:8000/passResetForm?mail=$userMail",
            ];


            Mail::to($userMail)->send(new verificationMail($details)) ;

            $request->session();
            Session::flash('error', 'Email Sent. Please Check Your E-mail!');
            Session::flash('alert', 'alert-success');
            return view('forgotPass');
        }
        else {
            $request->session();
            Session::flash('error', 'User Not Found!');
            Session::flash('alert', 'alert-danger');
            return view('forgotPass');
        }
    }

    function newPassword(Request $request)
    {
        $password = md5($request->password);
        $retypePass = md5($request->retypePAss);
        $emailAddress = $request->email;

        $data=array();
        $data['password'] = $password;

        if ($password == $retypePass) {

            if(DB::table('users')->where(['email'=>$emailAddress])->update($data) == true)
            {
                $request->session();
                Session::flash('error', 'Password Changed. Login Now');
                Session::flash('alert', 'alert-success');
                return view('login');
            }else {
                $request->session();
                Session::flash('error', 'Sorry ! Try Again.');
                Session::flash('alert', 'alert-danger');
                return view('login');
            }
        }
        else {
            $request->session();
            $error = 'NotMatched!';
            $alert= 'alert-danger';
            return redirect('/passResetForm?error='.$error.'&alert='.$alert.'&mail='.$emailAddress);
        }
    }

    function passChange(Request $request)
    {
        $data = array();
        $email = $request->email;
        $oldPass = md5($request->oldPass);
        $password = md5($request->password);
        $RetypePass = md5($request->RetypePass);

        $data['password'] = $password;

        if ($password == $RetypePass) {
            $pass =DB::table('users')->where(['email'=>$email])->first();
            if ($pass == true) {
                if ($pass->password == $oldPass)
                {
                    DB::table('users')->where(['email'=>$email])->update($data);
                    return redirect('/logout');
                }
                else
                {
                    $request->session();
                    Session::flash('error', 'Old Password Not Matched!');
                    Session::flash('alert', 'alert-danger');
                    return redirect('/profile');
                }

            }
            else {
                $request->session();
                Session::flash('error', 'user Not Found');
                Session::flash('alert', 'alert-danger');
                return redirect('/profile');
            }
        }
        else {
            $request->session();
            Session::flash('error', 'Password and confirm Pass Not matched');
            Session::flash('alert', 'alert-danger');
            return redirect('/profile');
        }

    }


}
