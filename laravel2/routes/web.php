<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/view_category',[AdminController::class,'view_category']);

Route::get('/view_subcategory',[AdminController::class,'view_subCategory']);
Route::post('/add_subcategory',[AdminController::class,'add_subCategory']);
Route::delete('/delete_subCategory',[AdminController::class,'destroySubCat']);


Route::post('/add_category',[AdminController::class,'add_category']);
Route::post('/add_product',[AdminController::class,'add_product']);
Route::delete('/delete_category',[AdminController::class,'delete_category']);
Route::delete('/delete_product/{id}',[AdminController::class,'delete_product']);


Route::get('/view_product',[AdminController::class,'view_product']);
Route::get('/view_product',[AdminController::class,'showCat']);
Route::get('/show_product',[AdminController::class,'show_product']);

Route::post('/activate/{id}',[AdminController::class,'activateOrDeactivate'])->name('admin.active');

Route::get('/editProduct/{id}',[AdminController::class,'editProduct'])->name('editProduct');
Route::post('/edit_product/{id}',[AdminController::class,'editP']);

//Route::get('/returnShowProduct',[AdminController::class,'returnShow']);
Route::get('/admin_home',[AdminController::class,'viewHome']);

Route::get('/add_to_cart/{id}',[HomeController::class,'add_to_cart'])->name('home.add_to_cart');
Route::get('/buy_now/{id}',[HomeController::class,'buyNow'])->name('home.buyNow');

Route::post('/addcart/{id}',[HomeController::class,'addToCart']);

Route::get('/category_product',[HomeController::class,'catProduct']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect'])->name('home.userpage');
Route::get('/show_cat/{id}',[HomeController::class,'filterCat']);
Route::get('/delete_cart/{id}',[HomeController::class,'deleteCart'])->name('home.deleteCat');
Route::get('/show_order',[AdminController::class,'showOrder']);
Route::get('/pay_order/{id}',[HomeController::class,'pay_order']);
Route::post('/place_order',[HomeController::class,'place_order']);


Route::post('/payment_status/{id}',[AdminController::class,'paymentStatus']);
Route::post('/ship_status/{id}',[AdminController::class,'shipStatus']);
Route::delete('/order_delete/{id}',[AdminController::class,'orderDelete'])->name('admin.delete_order');
Route::get('/show_users',[AdminController::class,'showUsers']);
Route::delete('/user_delete/{id}',[AdminController::class,'userDelete'])->name('admin.delete_user');

Route::get('/contact',[HomeController::class,'contact']);

Route::get('/financial',[AdminController::class,'financial']);

Route::get('/buyCart',[HomeController::class,'buyCart']);


//Email

Route::get('/test_mail', function (){
    $name = "Jamsy";

    \Illuminate\Support\Facades\Mail::to('mrjamzee002@gmail.com')->send(new \App\Mail\MyTestEmail($name));
});


Route::get('/generate_pdf',[AdminController::class,'generatePDF']);
