<?php

namespace App\ReadRepository\Blog;

use App\Entity\Blog\Tag;

class TagReadRepository
{
    public function findAll()
    {
        $tags = Tag::orderByDesc('id');
        return $tags;
    }

    public function getList()
    {
        $tags = Tag::all();
        return $tags;
    }

    public function find($id): ?Tag
    {
        $tag = Tag::findOrFail($id);
        return $tag;
    }

    public function findBySlug(string $slug): ?Tag
    {
        $tag = Tag::where('slug', $slug)->first();
        return $tag;
    }
}