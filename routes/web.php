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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    if(session()->has('user')) {
        return redirect('/products');
    }
    else {
        return view('login');
    }
});

Route::get('/register', function () {
    if(session()->has('user')) {
        return redirect('/products');
    }
    else {
        return view('/register_user');
    }
});

Route::post('/register', [UserController::class, 'create']);
Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::get('/admin', [UserController::class, 'adminPage']);

Route::get('/logout', function () {
    if(session()->has('user')) {
        session()->pull('user');
        return redirect('/');
    }
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/register-product', function() {
    if(session('user') === 'admin') {
        return view('register_product');
    }
    else if(session('user') !== 'admin' && session('user') !== null){
        return redirect('/products');
    }
    else {
        return redirect('/');
    }
});
Route::post('/register-product', [ProductController::class, 'addProduct']);
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/update-product/{id}', [ProductController::class, 'updateProductShow']);
Route::post('/update-product/{id}', [ProductController::class, 'updateProduct']);

Route::get('/user/cart', [CartController::class, 'create']);
Route::get('/product/buy/{id}', [CartController::class, 'store']);
Route::get('/delete/cart/product/{id}', [CartController::class, 'destroy']);