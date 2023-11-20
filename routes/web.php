<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('/view_catagory',[AdminController::class,'view_catagory']);

Route::post('/add_catagory',[AdminController::class,'add_catagory']);

Route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);

Route::get('/view_product',[AdminController::class,'view_product']);

Route::post('/add_product',[AdminController::class,'add_product']);

Route::get('/show_product',[AdminController::class,'show_product']);

Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

Route::get('/update_product/{id}',[AdminController::class,'update_product']);

Route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

Route::get('/order',[AdminController::class,'order']);

Route::get('/delivered/{id}',[AdminController::class,'delivered']);

Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

Route::get('/send_email/{id}',[AdminController::class,'send_email']);

Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

Route::get('/search',[AdminController::class,'searchdata']);

Route::get('/show_message',[AdminController::class,'show_message']);

Route::get('/view_feedback',[AdminController::class,'view_feedback']);




Route::get('/product_details/{id}',[HomeController::class,'product_details']);

Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

Route::get('/show_cart',[HomeController::class,'show_cart']);

Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

Route::get('/cash_order',[HomeController::class,'cash_order']);

Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);

Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');

Route::get('/show_order',[HomeController::class,'show_order']);

Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

Route::post('/add_comment',[HomeController::class,'add_comment']);

Route::post('/add_reply',[HomeController::class,'add_reply']);

Route::get('/product_search',[HomeController::class,'product_search']);

Route::get('/products',[HomeController::class,'products']);

Route::get('/search_product',[HomeController::class,'search_product']);

Route::get('/about',[HomeController::class,'about']);

Route::get('/testimonial',[HomeController::class,'testimonial']);

Route::post('/subscribe',[HomeController::class,'subscribe']);

Route::get('/show_feedback',[HomeController::class,'show_feedback']);

Route::post('/send_feedback',[HomeController::class,'send_feedback']);

Route::get('/show_contact',[HomeController::class,'show_contact']);

Route::post('/send_message',[HomeController::class,'send_message']);







