<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class versity extends Controller
{
    public function versityCreate(Request $request){
        $data=array();
        $data['instituteName'] = $request->instituteName;
        $data['code'] = $request->instituteCode;
        $data['campusName'] = $request->campus;



        if (DB::table('versity')->where(['code'=>$request->instituteCode])->first() == true) {

            $request->session();
                Session::flash('error', 'Code Duplicate');
                Session::flash('alert', 'alert-danger');
                return view('admin.createVersity');

        }
        else {

            if (DB::table('versity')->insert($data) == true) {


                $request->session();
                Session::flash('error', 'Successfully added new versity!');
                Session::flash('alert', 'alert-success');
                return redirect('/addNewVersity');
            }
            else {
                $request->session();
                Session::flash('error', 'Failed to add new versity! Try Again!');
                Session::flash('alert', 'alert-danger');
                return view('admin.createVersity');

            }
        }
    }
}
