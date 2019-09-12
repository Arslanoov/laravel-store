<?php

namespace App\Command\Admin\Blog\Comment\Remove;

use App\Repository\Blog\Post\CommentRepository;
use App\Repository\Blog\PostRepository;

class CommandHandler
{
    private $posts;
    private $comments;

    public function __construct(PostRepository $posts, CommentRepository $comments)
    {
        $this->posts = $posts;
        $this->comments = $comments;
    }

    public function __invoke(Command $command)
    {
        if ($command->comment->children()->exists()) {
            $this->comments->draft($command->comment);
        } else {
            $this->comments->remove($command->comment);
            $this->posts->deleteComment($command->comment->post);
        }
    }
}