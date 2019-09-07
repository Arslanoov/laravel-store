<?php

namespace App\Entity\Blog;

use App\Entity\Blog\Post\Post;
use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'blog_post_comments';
    protected $fillable = [
        'author_id', 'post_id', 'parent_id', 'text', 'active'
    ];

    public static function new($authorId, $postId, $parentId, $text): self
    {
        return static::create([
            'author_id' => $authorId,
            'post_id' => $postId,
            'parent_id' => $parentId,
            'text' => $text,
            'active' => true
        ]);
    }

    public function edit($parentId, $postId, $text): void
    {
        $this->update([
            'parent_id' => $parentId,
            'post_id' => $postId,
            'text' => $text
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
        return $this->belongsTo(Post::class, 'post_id', 'id');
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