<?php

namespace App\Command\Blog\Post\View;

use App\Entity\Blog\Post\Post;

class Command
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}