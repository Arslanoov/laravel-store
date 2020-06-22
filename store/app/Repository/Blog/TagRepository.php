<?php

namespace App\Repository\Blog;

use App\Entity\Blog\Tag;

class TagRepository
{
    public function create(string $name, string $slug): Tag
    {
        $tag = Tag::new(
            $name,
            $slug
        );

        return $tag;
    }

    public function update(Tag $tag, string $name, string $slug): void
    {
        $tag->update([
            'name' => $name,
            'slug' => $slug
        ]);
    }

    public function remove(Tag $tag): void
    {
        $tag->delete();
    }
}