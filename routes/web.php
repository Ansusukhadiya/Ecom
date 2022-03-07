<?php

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

// Route::get('/table',[App\Http\Controllers\GroupController::class,'tableget'])->name('tableget');

Route::get('/group',[App\Http\Controllers\GroupController::class,'groupget'])->name('groupget');
Route::post('/group',[App\Http\Controllers\GroupController::class,'grouppost'])->name('grouppost');


Route::get('/dash',[App\Http\Controllers\LoginController::class,'dash'])->name('dash');


Route::get('/',[App\Http\Controllers\LoginController::class,'home'])->name('home');
Route::get('/login',[App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::post('/login',[App\Http\Controllers\LoginController::class,'loginform'])->name('loginform');
Route::get('/register',[App\Http\Controllers\LoginController::class,'register'])->name('register');
Route::post('/register',[App\Http\Controllers\LoginController::class,'registerform'])->name('registerform');

Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout'])->name('logout');

Route::get('/forgetpassword',[App\Http\Controllers\LoginController::class,'forgetpw'])->name('forgetpw');
Route::post('/forgetpassword',[App\Http\Controllers\LoginController::class,'forgetpwpost'])->name('forgetpwpost');

// Route::get('/passwordreset',[App\Http\Controllers\LoginController::class,'pwreset'])->name('pwreset');
// Route::post('/passwordreset',[App\Http\Controllers\LoginController::class,'pwresetpost'])->name('pwresetpost');

Route::get('/passwordreset/{uuid}',[App\Http\Controllers\LoginController::class,'pwreset'])->name('pwreset');
Route::post('/passwordreset/{uuid}',[App\Http\Controllers\LoginController::class,'pwresetpost'])->name('pwresetpost');

Route::get('/pdf',[App\Http\Controllers\PdfController::class,'pdfget'])->name('pdfget');
Route::get('/pdf-mail',[App\Http\Controllers\PdfController::class,'pdfmail'])->name('pdfmail');
Route::get('/reg-pdf-mail',[App\Http\Controllers\PdfController::class,'regpdfmail'])->name('regpdfmail');

Route::get('/payment',[\App\Http\Controllers\PaymentController::class,'payment'])->name('payment');
Route::post('/payment-initiate',[\App\Http\Controllers\PaymentController::class,'initiate'])->name('initiate');
Route::post('/payment-success',[\App\Http\Controllers\PaymentController::class,'success'])->name('paysu');
// Route::get('/user/{id}', function ($id) {echo 'user Id = '.  $id;})->name('profile');

Route::get('/cart',[\App\Http\Controllers\ProductController::class,'cart'])->name('cart');
Route::get('/add-to-cart/{id}',[\App\Http\Controllers\ProductController::class,'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [\App\Http\Controllers\ProductController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [\App\Http\Controllers\ProductController::class, 'remove'])->name('remove.from.cart');

// Route::get('/', [ProductController::class, 'index']);
// Route::get('cart', [ProductController::class, 'cart'])->name('cart');
// Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');

Route::get('/buynow',[\App\Http\Controllers\BuyController::class,'buynow'])->name('buynow');
Route::post('/buynow-initiate',[\App\Http\Controllers\BuyController::class,'buynowinitiate'])->name('buynowinitiate');
Route::post('/buynow-payment-success',[\App\Http\Controllers\BuyController::class,'buynowsuccess'])->name('buynowpaysu');




Route::group(['middleware' => ['auth']] , function (){

    Route::group(['prefix' => 'dashboard','as' => 'dashboard.'] , function (){
        Route::get('/',[App\Http\Controllers\LoginController::class,'dashboard'])->name('dashboard');

Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout'])->name('logout');
Route::get('/data_analyst',[App\Http\Controllers\LoginController::class,'dataanalyst'])->name('dataanalyst');
Route::get('/admin',[App\Http\Controllers\LoginController::class,'admin'])->name('admin');

    });
});

