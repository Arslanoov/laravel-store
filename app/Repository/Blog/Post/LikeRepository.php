<?php

namespace App\Repository\Blog\Post;

use App\Entity\Blog\Post\Like;

class LikeRepository
{
    public function create(int $authorId, int $postId): Like
    {
        $like = Like::new($authorId, $postId);
        return $like;
    }
}