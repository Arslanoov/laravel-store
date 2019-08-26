<?php

namespace App\UseCases\Admin\Blog;

use App\Command\CommandBus;
use App\Query\QueryBus;
use App\Http\Requests\Admin\Blog\Tag\UpdateRequest;
use App\Http\Requests\Admin\Blog\Tag\CreateRequest;
use App\Command\Admin\Blog\Tag\Create\Command as TagCreateCommand;
use App\Command\Admin\Blog\Tag\Update\Command as TagUpdateCommand;
use App\Command\Admin\Blog\Tag\Remove\Command as TagRemoveCommand;
use App\Query\Blog\Tag\Find\FindTagsQuery;
use App\Entity\Blog\Tag;

class TagManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(CreateRequest $request): void
    {
        $this->commandBus->handle(new TagCreateCommand($request));
    }

    public function update(UpdateRequest $request, Tag $tag): void
    {
        $this->commandBus->handle(new TagUpdateCommand($tag, $request));
    }

    public function remove(Tag $tag): void
    {
        $this->commandBus->handle(new TagRemoveCommand($tag));
    }

    public function getTags()
    {
        $users = $this->queryBus->query(new FindTagsQuery());
        return $users;
    }
}