<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(){
        
        if(session()->has('user')) {
            $products = Product::all();
            return view('products', compact('products'));
        }
        else {
            return redirect('/');
        }
    }

    public function show($id) {
        if(session()->has('user')){
            $product = Product::find($id);
            $image = $product::find($product->id)->relImages;
            return view('product_spec', compact('product', 'image'));
        }
        else {
            return redirect('/');
        }
    }

    public function addProduct(Request $request) {
        Product::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'color'=>$request->color,
            'material'=>$request->material,
            'price'=>$request->price,
        ]);
        
        //pega o id do último produto criado
        $productID = Product::select('id')->where('title', $request->title)->first();

        //salva imagem no projeto
        $request->file('file')->move('../storage/app/public', $request->file('file')->getClientOriginalName());

        Image::create([
            'title'=> $request->file('file')->getClientOriginalName(),
            'id_produto'=>$productID->id,
        ]);

        return redirect('/products');
    }

    public function deleteProduct($id) {
        if(session('user') === 'admin') {
            $image = Product::find($id)->relImages;
            Storage::delete(url('/storage/'.$image->title)); //deleta imagem na pasta
    
            Product::where('id', '=', $id)->delete();
            return redirect('/admin');
        }
        else if(session('user') !== null && session('user') !== 'admin') {
            return redirect('/products');
        }        
        else {
            return redirect('/');
        }
    }

    public function updateProductShow($id) {
        if(session('user') === 'admin') {
            $product = Product::find($id);
            $image = Product::find($id)->relImages;
    
            return view('update_product', compact('product', 'image'));
        }
        else if(session('user') !== null && session('user') !== 'admin') {
            return redirect('/products');
        }
        else {
            return redirect('/');
        }
    }

    public function updateProduct(Request $request) {
        Product::where('id', '=', $request->id)->update([
            'title'=>$request->title,
            'category'=>$request->category,
            'color'=>$request->color,
            'material'=>$request->material,
            'price'=>$request->price,
        ]);

        if($request->file !== null) {
            $request->file('file')->move('../storage/app/public', $request->file('file')->getClientOriginalName());
            Image::where('id_produto', '=', $request->id)->update([
                'title'=> $request->file('file')->getClientOriginalName(),
            ]);
        }
        return redirect('admin');
    }

}
