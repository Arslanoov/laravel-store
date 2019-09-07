<?php

namespace App\ReadRepository\Blog;

use App\Entity\Blog\Comment;

class CommentReadRepository
{
    public function findAll()
    {
        $comments = Comment::orderByDesc('id');
        return $comments;
    }
}