<?php

namespace App\ReadRepository\Blog;

use App\Entity\Blog\Post\Post;

class PostReadRepository
{
    public function findAll()
    {
        $posts = Post::orderByDesc('id');
        return $posts;
    }
}