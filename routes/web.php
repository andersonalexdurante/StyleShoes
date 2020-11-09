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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    if(session()->has('user')) {
        return redirect('/products');
    }
    else {
        return view('login');
    }
});

Route::post('/authenticate', [AuthController::class, 'authenticate']);

Route::get('/admin', [AuthController::class, 'adminPage']);

Route::get('/logout', function () {
    if(session()->has('user')) {
        session()->pull('user');
        return redirect('/');
    }
});

Route::get('/products', function () {
    if(session()->has('user')) {
        return view('/products');
    }
    else {
        return redirect('/');
    }
});

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

Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct']);

Route::get('/update-product/{id}', [ProductController::class, 'updateProductShow']);

Route::post('/update-product/{id}', [ProductController::class, 'updateProduct']);