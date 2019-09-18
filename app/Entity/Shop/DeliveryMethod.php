<?php

namespace App\Entity\Shop;

use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    public $timestamps = false;

    protected $table = 'shop_delivery_methods';
    protected $fillable = [
        'name', 'cost', 'min_weight', 'max_weight', 'sort'
    ];

    public static function new(
        string $name, int $cost,
        int $minWeight, int $maxWeight,
        int $sort
    ): self
    {
        return static::create([
            'name' => $name,
            'cost' => $cost,
            'min_weight' => $minWeight,
            'max_weight' => $maxWeight,
            'sort' => $sort
        ]);
    }
}