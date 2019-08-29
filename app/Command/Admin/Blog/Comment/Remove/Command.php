<?php

namespace App\Command\Admin\Blog\Comment\Remove;

use App\Entity\Blog\Post\Comment;

class Command
{
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}