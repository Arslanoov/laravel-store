<?php

namespace App\ReadRepository\Shop;

use App\Entity\Shop\Comment;

class CommentReadRepository
{
    public function findAll()
    {
        $comments = Comment::orderByDesc('id');
        return $comments;
    }
}