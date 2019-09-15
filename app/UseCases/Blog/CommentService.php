<?php

namespace App\UseCases\Blog;

use App\Entity\Blog\Post\Post;
use App\Http\Requests\Blog\Comment\CreateRequest;
use App\Command\Blog\Comment\Create\Command as CommentCreateCommand;
use App\UseCases\Service;

class CommentService extends Service
{
    public function create(CreateRequest $request, Post $post, int $userId): void
    {
        $this->commandBus->handle(new CommentCreateCommand($request, $post, $userId));
    }
}