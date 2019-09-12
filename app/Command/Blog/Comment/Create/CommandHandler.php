<?php

namespace App\Command\Blog\Comment\Create;

use App\Repository\Blog\PostRepository;
use App\Repository\Blog\Post\CommentRepository;

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
        $this->comments->create(
            $command->parent, $command->post->id,
            $command->userId, $command->text
        );

        $this->posts->comment($command->post);
    }
}