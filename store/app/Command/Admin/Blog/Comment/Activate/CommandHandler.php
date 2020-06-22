<?php

namespace App\Command\Admin\Blog\Comment\Activate;

use App\Repository\Blog\CommentRepository;

class CommandHandler
{
    private $comments;

    public function __construct(CommentRepository $comments)
    {
        $this->comments = $comments;
    }

    public function __invoke(Command $command)
    {
        $this->comments->activate($command->comment);
    }
}