<?php

namespace App\UseCases\Blog;

use App\Query\Blog\Tag\Find\FindTagBySlugQuery;
use App\Query\Blog\Tag\Find\FindTagsListQuery;
use App\UseCases\Service;

class TagService extends Service
{
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