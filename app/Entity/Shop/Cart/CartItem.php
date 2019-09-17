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
        'user_id', 'product_id', 'quantity', 'total'
    ];

    public static function new(
        int $userId, int $productId,
        int $price, int $quantity
    )
    {
        return static::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'total' => $quantity * $price
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

    public function increaseProductsCount(): void
    {
        $qty = $this->quantity;

        $this->update([
            'quantity' => $qty + 1
        ]);
    }

    public function recountTotal()
    {
        $this->update([
            'total' => $this->quantity * $this->product->price
        ]);
    }
}