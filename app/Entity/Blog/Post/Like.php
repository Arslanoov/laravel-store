<?php

namespace App\Entity\Blog\Post;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = false;

    protected $table = 'blog_post_likes';
    protected $fillable = [
        'user_id', 'post_id'
    ];

    public static function new(
        $userId, $postId
    ): self
    {
        return static::create([
            'user_id' => $userId,
            'post_id' => $postId
        ]);
    }
}