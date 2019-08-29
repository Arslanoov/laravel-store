<?php

namespace App\UseCases\Blog;

use App\Command\CommandBus;
use App\Entity\Blog\Post\Post;
use App\Query\QueryBus;
use App\Command\Blog\Post\Like\Command as PostLikeCommand;

class PostService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function like(Post $post, int $userId): void
    {
        $this->commandBus->handle(new PostLikeCommand($post, $userId));
    }
}