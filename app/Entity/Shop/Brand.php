<?php

namespace App\Entity\Shop;

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
}