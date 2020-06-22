<?php

namespace App\Repository\Blog\Post;

use App\Entity\Blog\Post\TagAssignment;

class TagAssignmentRepository
{
    public function find($id): ?TagAssignment
    {
        $tagAssignment = TagAssignment::find($id);
        return $tagAssignment;
    }

    public function findByTag($tagId): ?TagAssignment
    {
        $tagAssignment = TagAssignment::where('tag_id', $tagId)->first();
        return $tagAssignment;
    }

    public function create(int $postId, int $tagId): TagAssignment
    {
        $tagAssignment = TagAssignment::new(
            $postId, $tagId
        );

        return $tagAssignment;
    }

    public function remove(TagAssignment $tagAssignment): void
    {
        $tagAssignment->delete();
    }

    public function isCreatedByTag($tagId): bool
    {
        return TagAssignment::where('tag_id', $tagId)->exists();
    }
}