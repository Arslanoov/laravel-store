<?php

namespace App\ReadRepository\Shop\Product;

use App\Entity\Shop\Product\Comment;

class CommentReadRepository
{
    public function findAll()
    {
        $comments = Comment::orderByDesc('id');
        return $comments;
    }
}