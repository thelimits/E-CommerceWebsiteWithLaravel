<?php

use App\Http\Controllers\Cart;
use App\Http\Controllers\Home;
use App\Http\Controllers\search;
use App\Http\Controllers\SignIn;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\History;
use App\Http\Controllers\Profile;
use App\Http\Controllers\DataBarang;
use App\Http\Controllers\Detail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

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
        return view('WelcomePage');
});
Route::middleware('guest')->group(function(){
    Route::get('/SignIn', [SignIn::class, 'ViewSignin'])->name('login');
    Route::post('/SignIn', [SignIn::class, 'authenticante']);
    Route::get('/SignUp', [SignUp::class, 'ViewSignUp']);
    Route::post('/SignUp', [SignUp::class, 'store']);
});

// route Group
Route::prefix('/Home/{role}')->middleware('auth')->group(function(){
    // universal
    Route::get('/Home', [Home::class, 'view'])->name('Home');
    Route::get('/Home', [Home::class, 'getBarang'])->name('Home');
    Route::get('/Detail/Barang/{id}', [Detail::class, 'view'])->name('Detail');
    Route::get('/Search', [search::class, 'view'])->name('Search');
    Route::get('/Search', [search::class, 'search'])->name('Search');
    Route::get('/Profile', [Profile::class, 'view'])->name('Profile');
    Route::get('/Profile/FormUpdatePassword/edit/{id}', [Profile::class, 'view_edit_pass'])->name('view_edit_pass');
    Route::post('/Profile/FormUpdatePassword/edit/{id}', [Profile::class, 'update_password'])->name('update_password');

    // for member
    Route::middleware('member')->group(function(){
        Route::get('/Profile/FormUpdate/edit/{id}', [Profile::class, 'view_edit'])->name('view_edit');
        Route::post('/Profile/FormUpdate/edit/{id}', [Profile::class, 'update'])->name('update');
        Route::get('/Cart', [Cart::class, 'view'])->name('Cart');
        Route::get('/Cart', [Cart::class, 'view_carts'])->name('Cart');
        Route::get('/Cart/Delete/Barang/{id}', [Cart::class, 'Delete_Barang']);
        Route::get('/Cart/Edit/Barang/{id}', [Cart::class, 'Update_Barang_view']);
        Route::post('/Cart/Edit/Barang/{id}/update', [Cart::class, 'update']);
        Route::post('/Detail/Barang/{id}/Cart', [Cart::class, 'insert_cart']);
        Route::post('/Cart/Checkout', [Cart::class, 'checkout']);
        Route::get('/History', [History::class, 'view'])->name('History');
    });

    // for admin
    Route::middleware('admin')->group(function(){
        Route::get('/AddItem', [DataBarang::class, 'view']);
        Route::post('/AddItem', [DataBarang::class, 'Data']);
        Route::get('/Delete/{id}', [DataBarang::class, 'Delete']);
    });

});

// get url image
Route::get('/storage/app/public/images/{nama}', function($nama){
    $content = Storage::get('/public/images/'.$nama);
    $mimes = Storage::mimeType('/public/images/'.$nama);
    $response = Response::make($content, 200);
    $response->header('Content-Type', $mimes);
    return $response;
});

Route::post('/Logout', [SignIn::class, 'Logout']);

Route::fallback(function(){
    return view('Main_Home.Home');
});
