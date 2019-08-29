<?php

namespace App\UseCases\Admin\Blog;

use App\Command\CommandBus;
use App\Entity\Blog\Post\Post;
use App\Query\Blog\Category\Find\FindCategoriesTreeQuery;
use App\Query\Blog\Post\Find\FindPostsQuery;
use App\Query\Blog\Post\GetPostStatusesQuery;
use App\Query\QueryBus;
use App\Http\Requests\Admin\Blog\Post\CreateRequest;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\Command\Admin\Blog\Post\Create\Command as PostCreateCommand;
use App\Command\Admin\Blog\Post\Update\Command as PostUpdateCommand;
use App\Command\Admin\Blog\Post\Remove\Command as PostRemoveCommand;
use App\Command\Admin\Blog\Post\Verify\Command as PostVerifyCommand;
use App\Command\Admin\Blog\Post\Draft\Command as PostDraftCommand;
use App\Command\Admin\Blog\Post\Photo\Command as PostUploadPhotoCommand;

class PostManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(CreateRequest $request, int $userId): void
    {
        $this->commandBus->handle(new PostCreateCommand($request, $userId));
    }

    public function update(UpdateRequest $request, Post $post): void
    {
        $this->commandBus->handle(new PostUpdateCommand($request, $post));
    }

    public function removePhoto(Post $post): void
    {
        $this->commandBus->handle(new PostUploadPhotoCommand($post));
    }

    public function remove(Post $post): void
    {
        $this->commandBus->handle(new PostRemoveCommand($post));
    }

    public function verify(Post $post): void
    {
        $this->commandBus->handle(new PostVerifyCommand($post));
    }

    public function draft(Post $post): void
    {
        $this->commandBus->handle(new PostDraftCommand($post));
    }

    public function getPosts()
    {
        $posts = $this->queryBus->query(new FindPostsQuery());
        return $posts;
    }

    public function getStatuses(): array
    {
        $statuses = $this->queryBus->query(new GetPostStatusesQuery());
        return $statuses;
    }

    public function getCategoryTree()
    {
        $categories = $this->queryBus->query(new FindCategoriesTreeQuery());
        return $categories;
    }
}