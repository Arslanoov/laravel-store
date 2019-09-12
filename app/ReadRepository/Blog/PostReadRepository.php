<?php

namespace App\ReadRepository\Blog;

use App\Entity\Blog\Post\Post;

class PostReadRepository
{
    public function findAll()
    {
        $posts = Post::orderByDesc('id');
        return $posts;
    }

    public function findLatest()
    {
        $posts = Post::orderByDesc('created_at')->active();
        return $posts;
    }

    public function findBest()
    {
        $posts = Post::orderByDesc('likes')->active();
        return $posts;
    }

    public function findPopular()
    {
        $posts = Post::orderByDesc('comments')->active();
        return $posts;
    }

    public function findByCategory(int $categoryId)
    {
        $post = Post::where('category_id', $categoryId)->active();
        return $post;
    }

    public function findById(int $id)
    {
        $post = Post::where('id', $id)->active()->first();
        return $post;
    }

    public function findByIdAndSlug(int $id, string $slug)
    {
        $post = Post::where('id', $id)->where('slug', $slug)->active()->first();
        return $post;
    }

    public function search($query)
    {
        $posts = Post::where('title', 'like', '%' . $query . '%')->active()->paginate(6);
        return $posts;
    }
}