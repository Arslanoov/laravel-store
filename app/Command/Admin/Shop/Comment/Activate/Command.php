<?php

namespace App\Command\Admin\Shop\Comment\Activate;

use App\Entity\Shop\Product\Comment;

class Command
{
    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}