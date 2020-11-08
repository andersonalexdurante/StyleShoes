<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $request) {
        $request->file('file')->store('public/images');
        return "Imagem adicionada!";
    }
}
