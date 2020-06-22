<?php

namespace App\Repository\Blog;

use App\Entity\Blog\Post\Post;

class PostRepository
{
    public function create(
        $authorId, $categoryId,
        $title, $slug,
        $description, $content
    ): Post
    {
        $post = Post::new(
            $authorId, $categoryId,
            $title, $slug,
            $description, $content
        );

        return $post;
    }

    public function update(
        Post $post, $categoryId,
        $title, $slug,
        $description, $content
    ): void
    {
        $post->update([
            'category_id' => $categoryId,
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'content' => $content
        ]);
    }

    public function addPhoto(Post $post, $photo): void
    {
        $post->photo = $photo->store('posts', 'public');
        $post->update();
    }

    public function removePhoto(Post $post): void
    {
        $post->update([
            'photo' => null
        ]);
    }

    public function remove(Post $post): void
    {
        $post->delete();
    }

    public function verify(Post $post): void
    {
        $post->verify();
    }

    public function draft(Post $post): void
    {
        $post->draft();
    }

    public function like(Post $post): void
    {
        $post->addLikesCount();
    }

    public function unlike(Post $post): void
    {
        $post->reduceLikesCount();
    }

    public function view(Post $post): void
    {
        $post->addViewsCount();
    }

    public function comment(Post $post): void
    {
        $post->addCommentsCount();
    }

    public function deleteComment(Post $post): void
    {
        $post->reduceCommentsCount();
    }
}