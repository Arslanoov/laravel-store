<?php

namespace App\UseCases\Admin\Shop\Product;

use App\Command\CommandBus;
use App\Entity\Shop\Product\Comment;
use App\Http\Requests\Admin\Shop\Product\Comment\UpdateRequest;
use App\Query\Shop\Product\Comment\Find\FindCommentsQuery;
use App\Query\QueryBus;
use App\Command\Admin\Shop\Product\Comment\Activate\Command as CommentActivateCommand;
use App\Command\Admin\Shop\Product\Comment\Update\Command as CommentUpdateCommand;
use App\Command\Admin\Shop\Product\Comment\Remove\Command as CommentRemoveCommand;

class CommentManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function update(UpdateRequest $request, Comment $comment): void
    {
        $this->commandBus->handle(new CommentUpdateCommand($comment, $request));
    }

    public function remove(Comment $comment): void
    {
        $this->commandBus->handle(new CommentRemoveCommand($comment));
    }

    public function activate(Comment $comment): void
    {
        $this->commandBus->handle(new CommentActivateCommand($comment));
    }

    public function getComments()
    {
        $users = $this->queryBus->query(new FindCommentsQuery());
        return $users;
    }
}