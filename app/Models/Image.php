<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='images';
    protected $fillable=['title', 'id_produto'];

    public function relProducts() {
        return $this->hasOne('App\Models\Product', 'id', 'id_produto');
    }
}
