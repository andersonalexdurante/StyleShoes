<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{

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
}
