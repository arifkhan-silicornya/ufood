<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class orderControll extends Controller
{
    public function orderMake(Request $request){
        $totalPrice = 0;

        $userid= Session::get(md5('ufoodUser'))['studentid'];
        $name= Session::get(md5('ufoodUser'))['name'];
        $carts = DB::table('carts')->where(['user_id'=>$userid])->get();


        foreach ($carts as $item)
        {
            if ($item->quantity > 0)
            {
                $products = DB::table('products')->where(['id'=>$item->product_id])->first();
                $totalPriceEI = $item->quantity*$products->pro_price;
                $totalPrice = $totalPriceEI + $totalPrice;

            }
        }

        $session = uniqid();

        $data = array();
        $data['customer_id'] = $userid;
        $data['customer_name'] = $name;
        $data['customer_address'] = $request->deliveryAddress;
        $data['phoneNumber'] = $request->phoneNumber;
        $data['total_Price'] = $totalPrice;
        $data['session_id'] = $session;


        DB::table('orders')->insert($data) ;
        $orders = DB::table('orders')->where(['session_id'=>$session,'customer_id'=>$userid])->first();


        foreach ($carts as $item)
        {
            if ($item->quantity > 0)
            {
                $products = DB::table('products')->where(['id'=>$item->product_id])->first();
                $totalPriceEI = $item->quantity*$products->pro_price;

                $inserDetails = array();
                $inserDetails['customer_id'] = $userid;
                $inserDetails['order_id'] = $orders->id;
                $inserDetails['item_id'] = $products->id;
                $inserDetails['quantity'] = $item->quantity;
                $inserDetails['price'] = $products->pro_price;
                $inserDetails['total_price'] = $totalPriceEI;

                DB::table('orders_details')->insert($inserDetails);


            }
        }

        return redirect('/orders');




    }
    public function orderCancel(Request $request)
    {
        $data = array();
        $data['status'] = 'cancel';

        DB::table('orders')->where(['id'=>$request->id])->update($data);
        return redirect('/orders?orderId='.$request->id);
    }

    public function managerCancelOrder(Request $request)
    {
        $data = array();
        $data['status'] = 'cancel';

        DB::table('orders')->where(['id'=>$request->orderid])->update($data);
        return redirect('/managerOrders?orderId='.$request->orderid);
    }
    public function adminCancelOrder(Request $request)
    {
        $data = array();
        $data['status'] = 'cancel';

        DB::table('orders')->where(['id'=>$request->orderid])->update($data);
        return redirect('/adminorders?orderId='.$request->orderid);
    }

    public function markDelivered(Request $request)
    {
        $data = array();
        $data['status'] = 'delivered';

        DB::table('orders')->where(['id'=>$request->orderID])->update($data);
        return redirect('/orders?orderId='.$request->orderID);
    }

    public function managerConfirmOrder(Request $request)
    {
        $data = array();
        $data['status'] = 'delivered';

        DB::table('orders')->where(['id'=>$request->orderid])->update($data);
        return redirect('/managerOrders?orderId='.$request->orderid);
    }

    public function adminConfirmOrder(Request $request)
    {
        $data = array();
        $data['status'] = 'delivered';

        DB::table('orders')->where(['id'=>$request->orderid])->update($data);
        return redirect('/adminorders?orderId='.$request->orderid);
    }

    public function paymentConfirm(Request $request)
    {
        $data = array();
        $data['payment_type'] = $request->exampleRadios;
        $data['status'] = 'processing';
        $orderId = $request->order_id;
        $totalPrice = $request->totalPrice;

        if ($request->exampleRadios == 'balance') {
            $userid= Session::get(md5('ufoodUser'))['studentid'];
            $user_account = DB::table('user_account')->where(['user_id'=>$userid])->first();
            $newPrice = $user_account->current_money - $totalPrice;

            $balanceUpdate = array();
            $balanceUpdate['current_money'] = $newPrice;
            DB::table('user_account')->where(['user_id'=>$userid])->update($balanceUpdate);

            DB::table('orders')->where(['id'=>$orderId])->update($data);
            return redirect('/orders?orderId='.$orderId);


        }
        else {
            DB::table('orders')->where(['id'=>$orderId])->update($data);
            return redirect('/orders?orderId='.$orderId);
        }



    }
}
