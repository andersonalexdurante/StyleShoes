<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Image;
class UserController extends Controller
{

    public function create(){
        if(session()->has('user')) {
            return redirect('/products');
        }
        else {
            return view('/register_user');
        }
    }

    public function store(Request $request) {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return redirect('/');
    }

    public function authenticate(Request $req){
        $data = $req->input();
        $user = User::where('email', '=', $data['email'])
            ->where('password', '=', $data['password'])->first();
        if($user === null) {
           return redirect('/');
        }
        else {
            $req->session()->put('user', $user->name);
            return redirect('products');
        }

    }

    public function adminPage() {
        $products = Product::all();
        $images = Image::all();
        if(session('user') === 'admin') {
            return view('admin', compact('products', 'images'));
        }
        else if(session('user') !== 'admin' && session('user') !== null){
            return redirect('/products');
        }
        else {
            return redirect('/');
        }
    }

    public function logout() {
        if(session()->has('user')) {
            session()->pull('user');
            return redirect('/');
        }
    }
}
