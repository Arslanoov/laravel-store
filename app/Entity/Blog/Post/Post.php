<?php

namespace App\Entity\Blog\Post;

use App\Entity\Blog\Category;
use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Post extends Model
{
    public const STATUS_ACTIVE = 'Active';
    public const STATUS_DRAFT = 'Draft';

    protected $table = 'blog_posts';

    protected $fillable = [
        'author_id', 'category_id', 'photo', 'title', 'slug',
        'description', 'content', 'status', 'views', 'comments'
    ];

    public static function new(
        $authorId, $categoryId,
        $title, $slug,
        $description, $content
    ): self
    {
        return static::create([
            'author_id' => $authorId,
            'category_id' => $categoryId,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'content' => $content,
            'status' => self::STATUS_DRAFT,
            'views' => 0,
            'comments' => 0,
            'likes' => 0
        ]);
    }

    public function verify(): void
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

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id', 'post_id');
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function getImageUrl(): string
    {
        return $this->photo ? '/storage/' . $this->photo : '';
    }

    public function like(): void
    {
        $likes = $this->likes;

        $this->update([
            'likes' => $likes + 1
        ]);
    }

    public static function statusesList(): array
    {
        return [
            Post::STATUS_ACTIVE => 'Active',
            Post::STATUS_DRAFT => 'Draft'
        ];
    }
}