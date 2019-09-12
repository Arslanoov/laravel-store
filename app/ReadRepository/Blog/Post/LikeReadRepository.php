<?php

namespace App\ReadRepository\Blog\Post;

use App\Entity\Blog\Post\Like;

class LikeReadRepository
{
    public function find(int $postId, int $userId)
    {
        return Like::where('post_id', $postId)->where('user_id', $userId)->first();
    }
}