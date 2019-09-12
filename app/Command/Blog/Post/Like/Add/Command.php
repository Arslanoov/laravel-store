<?php

namespace App\Command\Blog\Post\Like\Add;

use App\Entity\Blog\Post\Post;

class Command
{
    public $post;
    public $userId;

    public function __construct(Post $post, int $userId)
    {
        $this->post = $post;
        $this->userId = $userId;
    }
}