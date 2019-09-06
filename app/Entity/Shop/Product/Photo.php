<?php

namespace App\Entity\Shop\Product;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $timestamps = false;

    protected $table = 'shop_product_photos';
    protected $fillable = [
        'product_id', 'photo'
    ];
}