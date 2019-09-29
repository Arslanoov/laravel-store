<?php

namespace App\Entity\User;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    public $timestamps = false;

    protected $table = 'user_wishlist_items';
    protected $fillable = [
        'user_id', 'product_id'
    ];

    public static function new(
        int $userId, int $productId
    ): self
    {
        return static::create([
            'user_id' => $userId,
            'product_id' => $productId
        ]);
    }
}