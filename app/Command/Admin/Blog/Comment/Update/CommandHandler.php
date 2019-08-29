<?php

namespace App\Command\Admin\Blog\Comment\Update;

use App\Repository\Blog\Post\CommentRepository;

class CommandHandler
{
    private $comments;

    public function __construct(CommentRepository $comments)
    {
        $this->comments = $comments;
    }

    public function __invoke(Command $command)
    {
        $this->comments->edit(
            $command->comment,
            $command->parentId,
            $command->text
        );
    }
}