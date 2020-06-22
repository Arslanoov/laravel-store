<?php

namespace App\Entity\Shop\Cart;

use App\Entity\Shop\Product\Product;
use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public $timestamps = false;

    protected $table = 'shop_cart';
    protected $fillable = [
        'user_id', 'product_id', 'quantity',
        'total_price', 'total_weight'
    ];

    public static function new(
        int $userId, int $productId,
        int $price, int $weight, int $quantity
    )
    {
        return static::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'total_price' => $quantity * $price,
            'total_weight' => $quantity * $weight
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function increaseProductsCount(int $quantity): void
    {
        $currentQty = $this->quantity;

        $this->update([
            'quantity' => $currentQty + $quantity
        ]);
    }

    public function recountTotalPrice()
    {
        $this->update([
            'total_price' => $this->quantity * $this->product->price
        ]);
    }

    public function recountTotalWeight()
    {
        $this->update([
            'total_weight' => $this->quantity * $this->product->weight
        ]);
    }
}