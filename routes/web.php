<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\emailVerify;
use App\Http\Controllers\adminController;
use App\Http\Controllers\addNewProduct;
use App\Http\Controllers\createManager;
use App\Http\Controllers\managerController;
use App\Http\Controllers\userProfile;
use App\Http\Controllers\versity;
use App\Http\Controllers\recharge_user;
use App\Http\Controllers\stockUpdate;
use App\Http\Controllers\orderControll;
use App\Http\Controllers\addToCart;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
if (session()->has(md5('ufoodUser'))) {
    $instituteName= Session::get(md5('ufoodUser'))['instituteName'];
    $products = DB::table('products')->where(['instituteCode'=>$instituteName])->get();
    $user_account = DB::table('user_account')->get();
    $users = DB::table('users')->get();
    return view('index',compact('products'),compact('user_account'),compact('users'));
}
else
{
    return view('index');
}


});

Route::post('/userProfileUpdate', [userProfile::class,'profileUPdate']);
Route::post('/userpictureUpdate', [userProfile::class,'image']);



Route::get('/verifyuserAccount', [emailVerify::class,'verify']);

Route::get('/profile', function () {

    return view('profile');
});

Route::get('/createOrder', function () {
    $userid= Session::get(md5('ufoodUser'))['studentid'];
    $carts = DB::table('carts')->where(['user_id'=>$userid])->get();
    $carts2 = DB::table('carts')->where(['user_id'=>$userid,'quantity'=>0])->get();
    $count1 = $carts->count();
    $count2 = $carts2->count();
    $count = $count1 - $count2;
    if ($count == 0) {
        return redirect('/');
    }else {
        return view('createOrder');
    }

});


Route::get('/transactions', function () {
    $userid= Session::get(md5('ufoodUser'))['studentid'];
    $recharge_user = DB::table('recharge_user')->where(['userID'=>$userid])->orderBy('id', 'DESC')->paginate(5);
    return view('transactions',compact('recharge_user'));
});

Route::get('/orders', function () {
    if (isset($_REQUEST['status'])) {
        $status= $_REQUEST['status'];
        if ($status == 'all') {
            $userid= Session::get(md5('ufoodUser'))['studentid'];
            $orders = DB::table('orders')->where(['customer_id'=>$userid])->orderBy('id', 'DESC')->paginate(2);
            return view('orders',compact('orders'));
        }
        else {
            $userid= Session::get(md5('ufoodUser'))['studentid'];
            $orders = DB::table('orders')->where(['customer_id'=>$userid,'status'=>$status])->orderBy('id', 'DESC')->paginate(2);

            return view('orders',compact('orders'));
        }

    }
    elseif(isset($_REQUEST['orderId']))
    {
        $orderID = $_REQUEST['orderId'];
        $userid= Session::get(md5('ufoodUser'))['studentid'];

        $orders = DB::table('orders')->where(['customer_id'=>$userid,'id'=>$orderID])->paginate(2);
        return view('orders',compact('orders'));
    }
    else {
        $userid= Session::get(md5('ufoodUser'))['studentid'];
        $orders = DB::table('orders')->where(['customer_id'=>$userid])->orderBy('id', 'DESC')->paginate(2);
        return view('orders',compact('orders'));
    }

});

Route::get('/logout', function () {
    $username = md5('ufoodUser');
    session()->forget($username);
    return redirect('/');
});



Route::get('/forgotPass', function () {
    return view('forgotPass');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {

    return view('login');
});
Route::get('/passResetForm', function () {
    $usermailAddress  = $_REQUEST['mail'];


    return view('forgotPassForm')->with('usermailAddress', $usermailAddress);
});


Route::post('/login', [userController::class,'login']);
Route::post('/register', [userController::class,'signup']);
Route::post('/userPassChange', [userController::class,'passChange']);
Route::post('/recoverySendMail', [userController::class,'recoverMail']);
Route::post('/setNewPassword', [userController::class,'newPassword']);
Route::post('/addToCart', [addToCart::class,'addToCart']);
Route::get('/removeFromCart', [addToCart::class,'removeFromCart']);
Route::post('/orderCreate', [orderControll::class,'orderMake']);
Route::get('/orderCancel', [orderControll::class,'orderCancel']);
Route::get('/markDelivered', [orderControll::class,'markDelivered']);
Route::post('/paymentConfirm', [orderControll::class,'paymentConfirm']);







// For super admin all Route **************************************************


Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/addNewItem', function () {
    return view('admin.addNewItem');
});
Route::get('/createManager', function () {
    $manager = DB::table('manager')->paginate(3);
    return view('admin.createManager',compact('manager'));
});
Route::get('/foodList', function () {
    $products = DB::table('products')->paginate(5);
    return view('admin.foodList',compact('products'));
});
Route::get('/addNewVersity', function () {

    return view('admin.createVersity');
});

Route::get('/adminorders', function () {
    $orders = DB::table('orders')->orderBy('id', 'DESC')->paginate(5);

    return view('admin.orders',compact('orders'));
});

Route::get('/adminProfile', function () {
    return view('admin.profile');
});
Route::get('/userList', function () {
    return view('admin.userList');
});
Route::get('/adminRechargeUser', function () {

    return view('admin.rechargeUser');
});
Route::get('/adminTransactionsHistory', function () {
    return view('admin.transactionsHistory');
});



Route::post('/adminLogin', [adminController::class,'adminLogin']);
Route::post('/addNewProduct', [addNewProduct::class,'addProduct']);
Route::post('/managerCreateAction', [createManager::class,'createManager']);
Route::get('/banManager', [createManager::class,'banManager']);
Route::get('/activeManager', [createManager::class,'activeManager']);
Route::post('/instituteCreateAction', [versity::class,'versityCreate']);
Route::post('/adminNameChanged', [adminController::class,'changeName']);
Route::post('/adminChangePass', [adminController::class,'changePass']);
Route::post('/adminImageChange', [adminController::class,'changeImage']);
Route::post('/adminRechargeUser', [recharge_user::class,'getUserDetails']);
Route::post('/adminMoneyRecharge', [recharge_user::class,'accountRechargeAdmin']);
Route::post('/adminStockUpdate', [stockUpdate::class,'updateFood']);


Route::get('/adminConfirmOrder', [orderControll::class,'adminConfirmOrder']);
Route::get('/adminCancelOrder', [orderControll::class,'adminCancelOrder']);

Route::get('/adminLogout', function () {
    $username = md5('admin');
    session()->forget($username);
    return redirect('/admin');
});






// For Manager all Route ********************************************


Route::get('/manager', function () {
    return view('manager.index');
});
Route::get('/managerDashboard', function () {
    return view('manager.dashboard');
});
Route::get('/managerOrders', function () {
    $orders = DB::table('orders')->orderBy('id', 'DESC')->paginate(5);

    return view('manager.orders',compact('orders'));
});
Route::get('/managerProfile', function () {

    return view('manager.profile');
});
Route::get('/managerUserList', function () {
    return view('manager.userList');
});
Route::get('/managerFoodList', function () {
    $manager = Session::get(md5('manager'));
    $managr = DB::table('manager')->where(['email'=>$manager->email])->first();
    $products = DB::table('products')->where(['instituteCode'=>$managr->institute_name])->paginate(5);

    return view('manager.foodList',compact('products'));
});
Route::get('/managerAddNewItem', function () {
    return view('manager.addNewItem');
});
Route::get('/managerRechargeUser', function () {
    return view('manager.rechargeUser');
});
Route::get('/managerTransactionsHistory', function () {
    return view('manager.transactionsHistory');
});

Route::post('/managerLogin', [managerController::class,'managerLogin']);
Route::get('/managerLogout', function () {
    $username = md5('manager');
    session()->forget($username);
    return redirect('/manager');
});

Route::post('/managerAddNewProduct', [addNewProduct::class,'manageraddProduct']);
Route::post('/updateProfileManager', [managerController::class,'profileUpdate']);
Route::post('/managerPicChange', [managerController::class,'pictureUpdate']);
Route::post('/managerPassword', [managerController::class,'passUpdate']);
Route::post('/managerStockUpdate', [stockUpdate::class,'managerUpdateFood']);
Route::post('/managerRechargeUser', [recharge_user::class,'managerGetUserDetails']);
Route::post('/managerMoneyRecharge', [recharge_user::class,'accountRechargeManager']);
Route::get('/managerCancelOrder', [orderControll::class,'managerCancelOrder']);
Route::get('/managerConfirmOrder', [orderControll::class,'managerConfirmOrder']);
