<?php

namespace App\Repository\Shop;

use App\Entity\Shop\Comment;

class CommentRepository
{
    public function create(
        $userId, $productId,
        $parentId, $text
    ): Comment
    {
        $comment = Comment::new(
            $userId, $productId,
            $parentId, $text
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