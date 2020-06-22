<?php

namespace App\Entity\User;

use App\Entity\Shop\Product\Product;
use Illuminate\Database\Eloquent\Model;

class ComparisonItem extends Model
{
    public $timestamps = false;

    protected $table = 'user_comparison_items';
    protected $fillable = [
        'user_id', 'product_id'
    ];

    public static function new(int $userId, int $productId): self
    {
        return static::create([
            'user_id' => $userId,
            'product_id' => $productId
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
}