<?php

namespace App\Entity\Shop\Order;

use App\Entity\Shop\Product\Product;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $timestamps = false;

    protected $table = 'shop_order_items';
    protected $fillable = [
        'order_id', 'product_id', 'product_name',
        'product_price', 'product_quantity', 'total_price'
    ];

    public static function new(
        int $orderId, int $productId,
        string $productName, int $productPrice,
        int $productQuantity
    )
    {
        return static::create([
            'order_id' => $orderId,
            'product_id' => $productId,
            'product_name' => $productName,
            'product_price' => $productPrice,
            'product_quantity' => $productQuantity,
            'total_price' => $productQuantity * $productPrice
        ]);
    }

    public function getCost(): int
    {
        return $this->product_price * $this->product_quantity;
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}