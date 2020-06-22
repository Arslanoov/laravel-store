<?php

namespace App\UseCases\Admin\Shop;

use App\Entity\Shop\Comment;
use App\Http\Requests\Admin\Shop\Comment\UpdateRequest;
use App\Query\Shop\Comment\Find\FindCommentsQuery;
use App\Command\Admin\Shop\Comment\Activate\Command as CommentActivateCommand;
use App\Command\Admin\Shop\Comment\Update\Command as CommentUpdateCommand;
use App\Command\Admin\Shop\Comment\Remove\Command as CommentRemoveCommand;
use App\UseCases\Service;

class CommentManageService extends Service
{
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