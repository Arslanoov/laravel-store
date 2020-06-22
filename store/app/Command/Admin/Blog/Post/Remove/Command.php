<?php

namespace App\Command\Admin\Blog\Post\Remove;

use App\Entity\Blog\Post\Post;

class Command
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}