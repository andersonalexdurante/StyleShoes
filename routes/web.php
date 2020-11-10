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

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::get('/admin', [UserController::class, 'adminPage']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/register-product', [ProductController::class, 'create']);
Route::post('/register-product', [ProductController::class, 'store']);
Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);
Route::get('/update-product/{id}', [ProductController::class, 'updateProductShow']);
Route::put('/update-product/{id}', [ProductController::class, 'updateProduct']);

Route::get('/user/cart', [CartController::class, 'index']);
Route::post('/product/buy/{id}', [CartController::class, 'store']);
Route::delete('/delete/cart/product/{id}', [CartController::class, 'destroy']);