<?php

namespace App\Query\Blog\Tag\Find;

use App\ReadRepository\Blog\TagReadRepository;

class FindTagBySlugQueryHandler
{
    private $tags;

    public function __construct(TagReadRepository $tags)
    {
        $this->tags = $tags;
    }

    public function __invoke(FindTagBySlugQuery $query)
    {
        $tag = $this->tags->findBySlug($query->slug);
        return $tag;
    }
}