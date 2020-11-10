<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable=['title', 'category', 'color', 'material', 'price'];

    public function relImages() {
        return $this->hasOne('App\Models\Image', 'id_produto');
    }

    public function relCarts() {
        return $this->hasMany('App\Models\Carrinho', 'id_produto');
    }
}
