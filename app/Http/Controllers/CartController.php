<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Carrinho;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        if(session()->has('user')) {
            $user = User::where('name', '=', session('user'))->first();
            $carts = User::find($user->id)->relCarts;
            $products = array();          
            foreach ($carts as $cart => $value) {
                array_push($products, Carrinho::find($value->id)->relProducts);
            }
            $amount = 0.0;
            foreach ($products as $product => $value) {
                $amount = $amount + (float) $value->price;
            }
                        
            return view('/cart', compact('products', 'amount'));
        }
        else {
            return redirect('/');
        }
    }

    public function store($id) {
        if(session()->has('user')) {
            $user = User::where('name', '=', session('user'))->first();
            $product = Product::find($id);

            $cart = DB::table('carrinhos')
                ->join('users', 'carrinhos.id_usuario', '=', 'users.id')
                ->where('users.id', '=', $user->id)
                ->join('products', 'carrinhos.id_produto', '=', 'products.id')
                ->where('products.id', '=', $product->id)
                ->select('carrinhos.*')
                ->get();

            if(empty($cart[0])) {
                Carrinho::create([
                    'id_produto'=>$product->id,
                    'id_usuario'=>$user->id,
                ]);
                return redirect('/user/cart');
            }
            else{
                return redirect('/');
            }
        }
        else {
            return redirect('/');
        }
    }

    public function destroy($id) {
        if(session()->has('user')) {
            $user = User::where('name', '=', session('user'))->first();
            $product = Product::find($id);

            $cart = DB::table('carrinhos')
                ->join('users', 'carrinhos.id_usuario', '=', 'users.id')
                ->where('users.id', '=', $user->id)
                ->join('products', 'carrinhos.id_produto', '=', 'products.id')
                ->where('products.id', '=', $product->id)
                ->select('carrinhos.*')
                ->get();

            Carrinho::where('id', '=', $cart[0]->id)->delete();
            return redirect('/user/cart');
        }
        else {
            return redirect('/');
        }
    }
}
