<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class recharge_user extends Controller
{
    public function getUserDetails(Request $request)
    {
        $userid = $request->idToSearch;
        $user_account = DB::table('user_account')->where(['user_id'=>$userid])->first();

        if ($user_account != true) {
            $request->session();
            Session::flash('error', 'User Not Found!');
            Session::flash('alert', 'alert-danger');
            return view('admin.rechargeUser');
        }
        else {
            $request->session();
            Session::flash('error', 'User Found!');
            Session::flash('alert', 'alert-success');
            return view('admin.rechargeUser',compact('user_account'));
        }


    }
    public function managerGetUserDetails(Request $request)
    {
        $userid = $request->idToSearch;
        $user_account = DB::table('user_account')->where(['user_id'=>$userid])->first();

        if ($user_account != true) {
            $request->session();
            Session::flash('error', 'User Not Found!');
            Session::flash('alert', 'alert-danger');
            return view('manager.rechargeUser');
        }
        else {
            $request->session();
            Session::flash('error', 'User Found!');
            Session::flash('alert', 'alert-success');
            return view('manager.rechargeUser',compact('user_account'));
        }


    }
    public function accountRechargeAdmin(Request $request)
    {
        $data=array();
        $newMoney = $request->rechrg_Amount;
        $pinNumber = $request->pinNumber;
        $currentMoney = $request->current_money;
        $user_name = $request->user_name;
        $User_id = $request->User_id;
        $account = $request->account;

        $data['current_money'] = $newMoney + $currentMoney;

        if ($pinNumber == '123') {
            if (DB::table('user_account')->where(['user_id'=>$User_id])->update($data) == true) {

                $history = array();

                $history['userName'] = $user_name ;
                $history['userID'] =$User_id ;
                $history['accountNumber'] =$account;
                $history['amount'] =  $newMoney;
                $history['rechargedBy'] = 'admin';

                DB::table('recharge_user')->insert($history);

                $request->session();
                Session::flash('error', $user_name .' Get '.$newMoney.' TK. New Balance is '. $currentMoney);
                Session::flash('alert', 'alert-success');
                return view('admin.transactionsHistory');
            }
            else {
                $request->session();
                Session::flash('error', 'Something Wrong. Try Again');
                Session::flash('alert', 'alert-danger');
                return view('admin.rechargeUser');
            }
        }
        else {
            $request->session();
            Session::flash('error', 'PIN Number Wrong');
            Session::flash('alert', 'alert-danger');
            return view('admin.rechargeUser');
        }


    }
    public function accountRechargeManager(Request $request)
    {
        $data=array();
        $newMoney = $request->rechrg_Amount;
        $pinNumber = $request->pinNumber;
        $currentMoney = $request->current_money;
        $user_name = $request->user_name;
        $User_id = $request->User_id;
        $account = $request->account;
        $managerEmail = $request->managerEmail;

        $data['current_money'] = $newMoney + $currentMoney;

        if ($pinNumber == '123') {
            if (DB::table('user_account')->where(['user_id'=>$User_id])->update($data) == true) {

                $history = array();

                $history['userName'] = $user_name ;
                $history['userID'] =$User_id ;
                $history['accountNumber'] =$account;
                $history['amount'] =  $newMoney;
                $history['rechargedBy'] = $managerEmail;

                DB::table('recharge_user')->insert($history);

                $request->session();
                Session::flash('error', $user_name .' Get '.$newMoney.' TK. New Balance is '. $currentMoney);
                Session::flash('alert', 'alert-success');
                return view('manager.transactionsHistory');
            }
            else {
                $request->session();
                Session::flash('error', 'Something Wrong. Try Again');
                Session::flash('alert', 'alert-danger');
                return view('manager.rechargeUser');
            }
        }
        else {
            $request->session();
            Session::flash('error', 'PIN Number Wrong');
            Session::flash('alert', 'alert-danger');
            return view('manager.rechargeUser');
        }


    }
}
