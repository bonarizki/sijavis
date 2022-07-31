<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.index');
});

Route::middleware(['ifauth'])->group(function () {
    Route::get('login',function(){
        return view('auth.login');
    });
    Route::get('register',function(){
        return view('auth.register');
    });
});

Route::get('status', function() {
    $orders = Order::with('Category')
        ->where('user_id',Auth::user()->id)
        ->get();
    return view('user.status',compact('orders'));
});


Route::resource('service',ServiceController::class);

Route::post('login',[AuthController::class,'authenticate']);
Route::get('logout',[AuthController::class,'logout']);
Route::post('register',[AuthController::class,'register']);

Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin-dashboard',function(){
        return view('admin.dashboard');
    });
    Route::resource('category',CategoryController::class);
    Route::resource('users',UserController::class);
    Route::resource('orders',OrderController::class);
});

