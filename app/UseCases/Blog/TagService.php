<?php

namespace App\UseCases\Blog;

use App\Command\CommandBus;
use App\Query\Blog\Tag\Find\FindTagBySlugQuery;
use App\Query\Blog\Tag\Find\FindTagsListQuery;
use App\Query\QueryBus;

class TagService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function getAllTags()
    {
        $tags = $this->queryBus->query(new FindTagsListQuery());
        return $tags;
    }

    public function findTagBySlug(string $slug)
    {
        $tag = $this->queryBus->query(new FindTagBySlugQuery($slug));
        return $tag;
    }
}