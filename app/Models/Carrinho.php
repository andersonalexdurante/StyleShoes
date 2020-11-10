<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $table='carrinhos';
    protected $fillable=['id_produto', 'id_usuario'];

    public function relProducts() {
        return $this->belongsTo('App\Models\Product', 'id_produto');
    }

    public function relUsers() {
        return $this->belongsTo('App\Models\User', 'id_usuario');
    }
}
