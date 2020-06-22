<?php

namespace App\Query\Blog\Tag\Find;

use App\ReadRepository\Blog\TagReadRepository;

class FindTagsListQueryHandler
{
    private $tags;

    public function __construct(TagReadRepository $tags)
    {
        $this->tags = $tags;
    }

    public function __invoke(FindTagsListQuery $query)
    {
        $tags = $this->tags->getList();
        return $tags;
    }
}