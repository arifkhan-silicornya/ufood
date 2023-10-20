<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\Cloner\Data;

class stockUpdate extends Controller
{
    public function updateFood(Request $request){
        $id = $request->foodID;
        $stock = $request->stock;


        $data = array();

        $data['pro_quantity'] = $stock;


        if ($id != null && $stock !=null) {
            if(DB::table('products')->where(['id'=>$id])->update($data))
            {
                $request->session();
                Session::flash('error', 'Stock Update !');
                Session::flash('alert', 'alert-success');
                $products = DB::table('products')->get();
                return view('admin.foodList',compact('products'));
            }
            else {
                return redirect('/foodList');
            }
        }
        else {
            return redirect('/foodList');
        }
    }
    public function managerUpdateFood(Request $request){
        $id = $request->foodID;
        $stock = $request->stock;


        $data = array();

        $data['pro_quantity'] = $stock;


        if ($id != null && $stock !=null) {
            if(DB::table('products')->where(['id'=>$id])->update($data))
            {
                $request->session();
                Session::flash('error', 'Stock Update !');
                Session::flash('alert', 'alert-success');
                $manager = Session::get(md5('manager'));
                $managr = DB::table('manager')->where(['email'=>$manager->email])->first();
                $products = DB::table('products')->where(['instituteCode'=>$managr->institute_name])->paginate(5);

                return view('manager.foodList',compact('products'));
            }
            else {
                return redirect('/managerFoodList');
            }
        }
        else {
            return redirect('/managerFoodList');
        }
    }
}
