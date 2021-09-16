<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class addToCart extends Controller
{
    public function addToCart(Request $request)
    {

        $data=array();
        $data['user_id'] = $request->userID;
        $data['product_id'] = $request->productID;
        $data['quantity'] = $request->quantity;

        $updateQuantity = array();
        $updateQuantity['quantity'] = $request->quantity;

        if (DB::table('carts')->where(['user_id'=>$request->userID,'product_id'=>$request->productID])->first() == true) {

            DB::table('carts')->where(['user_id'=>$request->userID,'product_id'=>$request->productID])->update($updateQuantity);

            $request->session();
            Session::flash('error', "This item already have 'add to cart'.!");
            Session::flash('alert', 'alert-danger');
            return redirect('/');
        }
        else {
            DB::table('carts')->insert($data);
            return redirect('/');
        }

    }
    public function removeFromCart(Request $request )
    {
        $userID = Session::get(md5('ufoodUser'))['studentid'];

        $data=array();
        $data['quantity'] = 0;
        DB::table('carts')->where(['user_id'=>$userID,'product_id'=>$request->pID])->update($data);
        return redirect('/');
    }
}
