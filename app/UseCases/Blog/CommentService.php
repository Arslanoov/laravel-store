<?php

namespace App\UseCases\Blog;

use App\Command\CommandBus;
use App\Entity\Blog\Post\Post;
use App\Http\Requests\Blog\Comment\CreateRequest;
use App\Query\QueryBus;
use App\Command\Blog\Comment\Create\Command as CommentCreateCommand;

class CommentService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(CreateRequest $request, Post $post, int $userId): void
    {
        $this->commandBus->handle(new CommentCreateCommand($request, $post, $userId));
    }
}