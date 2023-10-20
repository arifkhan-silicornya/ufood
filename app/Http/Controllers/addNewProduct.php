<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addNewProduct extends Controller
{
    public function addProduct(Request $request)
    {


        $data=array();
        // $image_Name=$request->productImage;
        $data['pro_name'] = $request->productName;
        $data['pro_quantity'] = $request->quantity;
        $data['pro_price'] = $request->price;
        $data['pro_category'] = $request->category;
        $data['pro_details'] = $request->details;
        $data['instituteCode'] = $request->canteenName;

        $image = $request->file('productImage');
        $name = time().'.'.$image->getClientOriginalExtension();
        $uploads_dir = "img/products/";
        $moveToFolder = $image->move($uploads_dir, $name);

        $data['pro_img_name'] = $name;


        if ($moveToFolder ==true)
        {
            if (DB::table('products')->insert($data) == true){
                return redirect('/foodList');
            }else {
                return redirect('/addNewItem');
            }
        }
        else {
            return redirect('/addNewItem');
        }
    }

    public function manageraddProduct(Request $request)
    {
        $data=array();
        // $image_Name=$request->productImage;
        $data['pro_name'] = $request->productName;
        $data['pro_quantity'] = $request->quantity;
        $data['pro_price'] = $request->price;
        $data['pro_category'] = $request->category;
        $data['pro_details'] = $request->details;
        $data['instituteCode'] = $request->insCode;


        $image = $request->file('productImage');
        $name = time().'.'.$image->getClientOriginalExtension();
        $uploads_dir = "img/products/";
        $moveToFolder = $image->move($uploads_dir, $name);

        $data['pro_img_name'] = $name;

        // $moveToFolder = move_uploaded_file($tmp_name, "$uploads_dir/$uniqName.jpg");
        if ($moveToFolder ==true)
        {
            if (DB::table('products')->insert($data) == true){
                return redirect('/managerFoodList');
            }else {
                return redirect('/managerAddNewItem');
            }
        }
        else {
            return redirect('/managerAddNewItem');
        }
    }
}
