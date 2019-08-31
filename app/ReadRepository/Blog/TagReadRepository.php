<?php

namespace App\ReadRepository\Blog;

use App\Entity\Blog\Tag;

class TagReadRepository
{
    public function find($id): ?Tag
    {
        $tag = Tag::findOrFail($id);
        return $tag;
    }

    public function findAll()
    {
        $tags = Tag::orderByDesc('id');
        return $tags;
    }
}