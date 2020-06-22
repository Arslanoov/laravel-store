<?php

namespace App\Entity\Shop;

use App\Entity\Shop\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $table = 'shop_brands';
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    public static function new(
        string $name,
        string $slug,
        $description
    ): self
    {
        return static::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $description
        ]);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}