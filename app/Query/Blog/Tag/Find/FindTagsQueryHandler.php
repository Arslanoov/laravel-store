<?php

namespace App\Query\Blog\Tag\Find;

use App\Entity\Blog\Tag;
use App\ReadRepository\Blog\TagReadRepository;

class FindTagsQueryHandler
{
    private $tags;

    public function __construct(TagReadRepository $tags)
    {
        $this->tags = $tags;
    }

    public function __invoke(FindTagsQuery $query)
    {
        $tags = $this->tags->findAll();
        return $tags;
    }
}