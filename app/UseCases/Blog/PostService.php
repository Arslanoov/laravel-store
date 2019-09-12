<?php

namespace App\UseCases\Blog;

use App\Entity\Blog\Tag;
use App\Query\Blog\Post\Find\FindAllPostsQuery;
use App\Query\Blog\Post\Find\FindPopularPostsQuery;
use App\Query\Blog\Post\Find\FindBestPostsQuery;
use App\Command\CommandBus;
use App\Entity\Blog\Post\Post;
use App\Query\Blog\Post\Find\FindPostByIdQuery;
use App\Query\Blog\Post\Find\FindPostBySlugQuery;
use App\Query\Blog\Post\Like\FindLikeQuery;
use App\Query\Blog\Post\Find\FindPostsByTagQuery;
use App\Query\Blog\Post\Search\PostsSearchQuery;
use App\Query\QueryBus;
use App\Command\Blog\Post\View\Command as PostViewCommand;
use App\Command\Blog\Post\Like\Remove\Command as LikeRemoveCommand;
use App\Command\Blog\Post\Like\Add\Command as LikeAddCommand;

class PostService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function like(int $postId, int $userId)
    {
        $post = $this->queryBus->query(new FindPostByIdQuery($postId));
        $like = $this->queryBus->query(new FindLikeQuery($post->id, $userId));

        if ($like) {
            $likes = $this->commandBus->handle(new LikeRemoveCommand($post, $like));
        } else {
            $likes = $this->commandBus->handle(new LikeAddCommand($post, $userId));
        }

        return $likes;
    }

    public function view(Post $post): void
    {
        $this->commandBus->handle(new PostViewCommand($post));
    }

    public function search($q)
    {
        $posts = $this->queryBus->query(new PostsSearchQuery($q));
        return $posts;
    }

    public function getAllPosts()
    {
        $posts = $this->queryBus->query(new FindAllPostsQuery());
        return $posts;
    }

    public function getBestPosts()
    {
        $posts = $this->queryBus->query(new FindBestPostsQuery());
        return $posts;
    }

    public function getPopularPosts()
    {
        $posts = $this->queryBus->query(new FindPopularPostsQuery());
        return $posts;
    }

    public function findPostById(int $id)
    {
        $post = $this->queryBus->query(new FindPostByIdQuery($id));
        return $post;
    }

    public function findPostBySlug(int $id, string $slug)
    {
        $post = $this->queryBus->query(new FindPostBySlugQuery($id, $slug));
        return $post;
    }
}