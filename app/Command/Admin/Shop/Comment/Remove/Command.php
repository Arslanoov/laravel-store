<?php

namespace App\Command\Admin\Shop\Comment\Remove;

use App\Entity\Shop\Comment;

class Command
{
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}