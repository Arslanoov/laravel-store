<?php

namespace App\ReadRepository\Blog\Post;

use App\Entity\Blog\Post\Comment;

class CommentReadRepository
{
    public function findAll()
    {
        $comments = Comment::orderByDesc('id');
        return $comments;
    }
}