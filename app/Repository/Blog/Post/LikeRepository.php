<?php

namespace App\Repository\Blog\Post;

use App\Entity\Blog\Post\Like;

class LikeRepository
{
    public function create(int $userId, int $postId): Like
    {
        $like = Like::new($userId, $postId);
        return $like;
    }

    public function remove(Like $like): void
    {
        $like->delete();
    }
}