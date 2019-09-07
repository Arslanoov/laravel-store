<?php

namespace App\Entity\Shop\Product;

use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'shop_product_comments';
    protected $fillable = [
        'author_id', 'product_id', 'parent_id', 'text', 'active'
    ];

    public static function new(
        $authorId, $productId,
        $parentId, $text
    ): self
    {
        return static::create([
            'author_id' => $authorId,
            'product_id' => $productId,
            'parent_id' => $parentId,
            'text' => $text,
            'active' => true
        ]);
    }

    public function activate(): void
    {
        $this->update([
            'active' => true
        ]);
    }

    public function draft(): void
    {
        $this->update([
            'active' => false
        ]);
    }

    public function isActive(): bool
    {
        return $this->active == true;
    }

    public function isDraft(): bool
    {
        return $this->active == false;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }

    public function isChildOf($id): bool
    {
        return $this->parent_id == $id;
    }

    public function post()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }
}