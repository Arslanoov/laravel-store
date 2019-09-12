<?php

namespace App\Command\Blog\Post\Like\Remove;

use App\Entity\Blog\Post\Like;
use App\Entity\Blog\Post\Post;

class Command
{
    public $post;
    public $like;

    public function __construct(Post $post, Like $like)
    {
        $this->post = $post;
        $this->like = $like;
    }
}