<?php

namespace App\ReadRepository\Blog\Post;

use App\Entity\Blog\Post\TagAssignment;
use App\Entity\Blog\Tag;

class TagAssignmentReadRepository
{
    public function findAllByPost(int $postId)
    {
        $assignments = TagAssignment::where('post_id', $postId)->get();
        return $assignments;
    }
}