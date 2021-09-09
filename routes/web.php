<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\BrandController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\OrderController;

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
    return redirect('login');
});

Auth::routes();

Route::middleware(['auth:user'])->group(function(){
    Route::get('home', [UserController::class, 'index'])->name('home');
    
    Route::get('add-product/{product_id}', [UserController::class, 'addProduct']);
    Route::get('orderDetails/{orderId}', [UserController::class , 'orderDetails']);
    Route::match(['get', 'post'], 'checkout', [UserController::class, 'checkout']);
    Route::get('order', [UserController::class, 'getMyOrder']);
});

Route::get('vendor/register', [VendorController::class, 'showRegistrationForm']);
Route::post('vendor/register', [VendorController::class, 'register'])->name('vendorRegister');


Route::middleware(['auth:vendor'])->prefix('vendor')->group(function(){
    Route::get('home', [VendorController::class, 'index']);

    Route::get('brands', [BrandController::class, 'showBrands']);
    Route::get('products', [ProductController::class, 'showProducts']);


    Route::post('create-brand', [BrandController::class, 'createBrand']);
    Route::post('create-product', [ProductController::class, 'addProduct']);
});

