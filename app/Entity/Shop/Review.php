<?php

namespace App\Entity\Shop;

use App\Entity\Shop\Product\Product;
use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'shop_product_reviews';
    protected $fillable = [
        'author_id', 'product_id', 'rating', 'text'
    ];

    public static function new(
        int $authorId, int $productId,
        int $rating, string $text
    ): self
    {
        return static::create([
            'author_id' => $authorId,
            'product_id' => $productId,
            'rating' => $rating,
            'text' => $text
        ]);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}