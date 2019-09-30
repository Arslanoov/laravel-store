<?php

namespace App\Entity\Shop\Product;

use App\Entity\Shop\Characteristic\Variant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Entity\Shop\Characteristic\Characteristic as ShopCharacteristic;

class Characteristic extends Model
{
    public $timestamps = false;

    protected $table = 'shop_product_characteristics';
    protected $fillable = [
        'product_id', 'characteristic_id', 'variant_id'
    ];

    public static function new(
        int $productId,
        int $characteristicId
    ): self
    {
        return static::create([
            'product_id' => $productId,
            'characteristic_id' => $characteristicId
        ]);
    }

    public function addVariant(int $variantId): void
    {
        $this->update([
            'variant_id' => $variantId
        ]);
    }

    public function characteristic()
    {
        return $this->belongsTo(ShopCharacteristic::class, 'characteristic_id', 'id');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }
}