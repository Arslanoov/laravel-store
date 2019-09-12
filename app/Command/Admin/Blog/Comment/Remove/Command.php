<?php

namespace App\Command\Admin\Blog\Comment\Remove;

use App\Entity\Blog\Comment;
use App\Entity\Blog\Post\Post;

class Command
{
    public $comment;

    public function __construct(Post $post, Comment $comment)
    {
        $this->comment = $comment;
    }
}