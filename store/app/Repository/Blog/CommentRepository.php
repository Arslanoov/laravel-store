<?php

namespace App\Repository\Blog;

use App\Entity\Blog\Comment;

class CommentRepository
{
    public function create(
        $parent, $postId,
        $userId, $text
    ): Comment
    {
        $comment = Comment::new(
            $parent, $postId,
            $userId, $text
        );

        return $comment;
    }

    public function edit(Comment $comment, $parentId, $text): void
    {
        $comment->update([
            'parent_id' => $parentId,
            'text' => $text
        ]);
    }

    public function remove(Comment $comment): void
    {
        $comment->delete();
    }

    public function activate(Comment $comment): void
    {
        $comment->activate();
    }

    public function draft(Comment $comment): void
    {
        $comment->draft();
    }
}