<?php

namespace App\Command\Admin\Blog\Comment\Remove;

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
        if ($command->comment->children()->exists()) {
            $this->comments->draft($command->comment);
        } else {
            $this->comments->remove($command->comment);
        }
    }
}