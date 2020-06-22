<?php

namespace App\Entity\Blog\Post;

use Illuminate\Database\Eloquent\Model;

class TagAssignment extends Model
{
    public $timestamps = false;

    protected $table = 'blog_tag_assignments';
    protected $fillable = [
        'post_id', 'tag_id'
    ];

    public static function new(int $postId, int $tagId): self
    {
        return static::create([
            'post_id' => $postId,
            'tag_id' => $tagId
        ]);
    }
}