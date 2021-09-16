<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class createManager extends Controller
{
    public function createManager(Request $request)
    {
        $data=array();
        $data['manager_name'] = $request->managerName;
        $data['institute_name'] = $request->instituteName;
        $data['email'] = $request->email;
        $data['NID'] = $request->NID;
        $data['phone'] = $request->phoneNumber;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['manager_password'] = md5($request->password);

        $password = $request->password;
        $retypepass = $request->retypePass;

        if ($password == $retypepass) {

            if (DB::table('manager')->where(['email'=>$request->email ])->first() == false) {
                if (DB::table('manager')->where(['NID'=>$request->NID ])->first() == false) {
                    if (DB::table('manager')->insert($data) == true) {
                        Session::flash('error', 'New Manager Created!');
                        Session::flash('alert', 'alert-success');
                        return redirect('/createManager');
                    }
                    else {
                        Session::flash('error', 'Data Not Inserted!');
                        Session::flash('alert', 'alert-danger');
                        return redirect('/createManager');
                    }
                }
                else {
                    Session::flash('error', 'Use another NID. NID Already Used!');
                    Session::flash('alert', 'alert-danger');
                    return redirect('/createManager');
                }
            }
            else {
                Session::flash('error', 'Use another Email. This Email Already used!');
                Session::flash('alert', 'alert-danger');
                return redirect('/createManager');
            }

            // admin.createManager
        }
        else {
            Session::flash('error', 'Retype password not matched.!');
            Session::flash('alert', 'alert-danger');
            return redirect('/createManager');
        }
    }
    public function banManager(Request $request)
    {
        $managerID = $request->managerid;

        $data = array();

        $data['active'] = 0;

        DB::table('manager')->where(['id'=>$managerID ])->update($data);

        Session::flash('error', 'Manager Disabled!');
        Session::flash('alert', 'alert-success');
        return redirect('/createManager');


    }
    public function activeManager(Request $request)
    {
        $managerID = $request->managerid;

        $data = array();

        $data['active'] = 1;

        DB::table('manager')->where(['id'=>$managerID ])->update($data);

        Session::flash('error', 'Manager Active again!');
        Session::flash('alert', 'alert-success');
        return redirect('/createManager');


    }
}
