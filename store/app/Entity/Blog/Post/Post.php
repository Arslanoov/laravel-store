<?php

namespace App\Entity\Blog\Post;

use App\Entity\Blog\Category;
use App\Entity\Blog\Comment;
use App\Entity\Blog\Tag;
use App\Entity\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Post extends Model
{
    public const STATUS_ACTIVE = 'Active';
    public const STATUS_DRAFT = 'Draft';

    protected $table = 'blog_posts';

    protected $fillable = [
        'author_id', 'category_id', 'photo', 'title', 'slug',
        'description', 'content', 'status', 'views', 'comments', 'likes'
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

    public function commentsList()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id')->where('parent_id', '=', null);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag_assignments');
    }

    public function hasTag($tagId): bool
    {
        $tags = $this->tags;

        foreach ($tags as $tag) {
            if ($tag->id == $tagId) {
                return true;
            }
        }

        return false;
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
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

    public function addLikesCount(): void
    {
        $likes = $this->likes;

        $this->update([
            'likes' => $likes + 1
        ]);
    }

    public function reduceLikesCount(): void
    {
        $likes = $this->likes;

        $this->update([
            'likes' => $likes - 1
        ]);
    }

    public function addViewsCount(): void
    {
        $views = $this->views;

        $this->update([
            'views' => $views + 1
        ]);
    }

    public function addCommentsCount(): void
    {
        $comments = $this->comments;

        $this->update([
            'comments' => $comments + 1
        ]);
    }

    public function reduceCommentsCount(): void
    {
        $comments = $this->comments;

        $this->update([
            'comments' => $comments - 1
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