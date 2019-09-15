<?php

namespace App\Entity\Shop\Product;

use App\Entity\Shop\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Comment;
use App\Entity\Shop\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Entity\Shop\Product\Characteristic as ProductCharacteristic;

class Product extends Model
{
    public const STATUS_ACTIVE = 'Active';
    public const STATUS_DRAFT = 'Draft';

    public const AVAILABILITY_IN_STOCK = 'in-stock';
    public const AVAILABILITY_OUT_OF_STOCK = 'out-of-stock';

    protected $table = 'shop_products';
    protected $fillable = [
        'category_id', 'brand_id', 'availability', 'title', 'slug', 'price',
        'content', 'status', 'reviews', 'comments', 'rating'
    ];

    public static function new(
        $categoryId, $brandId, $title,
        $slug, $price, $content
    ): self
    {
        return static::create([
            'category_id' => $categoryId,
            'brand_id' => $brandId,
            'availability' => self::AVAILABILITY_OUT_OF_STOCK,
            'title' => $title,
            'slug' => $slug,
            'price' => $price,
            'content' => $content,
            'status' => self::STATUS_DRAFT,
            'reviews' => 0,
            'comments' => 0,
            'rating' => null
        ]);
    }

    public function activate(): void
    {
        $this->update([
            'status' => self::STATUS_ACTIVE
        ]);
    }

    public function draft(): void
    {
        $this->update([
            'status' => self::STATUS_DRAFT
        ]);
    }

    public function makeAvailable(): void
    {
        $this->update([
            'availability' => self::AVAILABILITY_IN_STOCK
        ]);
    }

    public function makeUnavailable(): void
    {
        $this->update([
            'availability' => self::AVAILABILITY_OUT_OF_STOCK
        ]);
    }

    public function addCommentsCount(): void
    {
        $commentsCount = $this->comments;

        $this->update([
            'comments' => $commentsCount + 1
        ]);
    }

    public function reduceCommentsCount(): void
    {
        $commentsCount = $this->comments;

        $this->update([
            'comments' => $commentsCount - 1
        ]);
    }

    public function addReviewsCount(): void
    {
        $reviewsCount = $this->reviews;

        $this->update([
            'reviews' => $reviewsCount + 1
        ]);
    }

    public function reduceReviewsCount(): void
    {
        $reviewsCount = $this->reviews;

        $this->update([
            'reviews' => $reviewsCount - 1
        ]);
    }

    public function isAvailable(): bool
    {
        return $this->availability == self::AVAILABILITY_IN_STOCK;
    }

    public function isUnavailable(): bool
    {
        return $this->availability == self::AVAILABILITY_OUT_OF_STOCK;
    }

    public function isActive(): bool
    {
        return $this->status == self::STATUS_ACTIVE;
    }

    public function isDraft(): bool
    {
        return $this->status == self::STATUS_DRAFT;
    }

    public function getImageUrl($photoUrl): string
    {
        return $photoUrl ? '/storage/' . $photoUrl : '';
    }

    public function recountRating(): void
    {
        $sum = 0;

        foreach ($this->reviews()->get() as $review) {
            $sum += $review->rating;
        }

        $rating = round($sum / $this->reviews()->count());

        $this->update([
            'rating' => $rating
        ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function characteristics()
    {
        return $this->hasMany(ProductCharacteristic::class, 'product_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'product_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id', 'id')->where('parent_id', '=', null);
    }

    public function reviewWhere(int $rating)
    {
        return $this->hasMany(Review::class, 'product_id', 'id')->where('rating', $rating);
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public static function availabilitiesList(): array
    {
        return [
            Product::AVAILABILITY_OUT_OF_STOCK => 'Out Of Stock',
            Product::AVAILABILITY_IN_STOCK => 'In Stock'
        ];
    }

    public static function statusesList(): array
    {
        return [
            Product::STATUS_DRAFT => 'Draft',
            Product::STATUS_ACTIVE => 'Active'
        ];
    }
}