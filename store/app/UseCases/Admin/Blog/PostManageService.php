<?php

namespace App\UseCases\Admin\Blog;

use App\Entity\Blog\Post\Post;
use App\Query\Blog\Category\Find\FindCategoriesTreeQuery;
use App\Query\Blog\Post\Find\FindPostsQuery;
use App\Query\Blog\Post\GetPostStatusesQuery;
use App\Query\Blog\Tag\Find\FindTagsQuery;
use App\Http\Requests\Admin\Blog\Post\CreateRequest;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\Command\Admin\Blog\Post\Create\Command as PostCreateCommand;
use App\Command\Admin\Blog\Post\Update\Command as PostUpdateCommand;
use App\Command\Admin\Blog\Post\Remove\Command as PostRemoveCommand;
use App\Command\Admin\Blog\Post\Verify\Command as PostVerifyCommand;
use App\Command\Admin\Blog\Post\Draft\Command as PostDraftCommand;
use App\Command\Admin\Blog\Post\Photo\Command as PostUploadPhotoCommand;
use App\Command\Admin\Blog\TagAssignment\Existing\Command as AddExistingTagsToPost;
use App\Command\Admin\Blog\TagAssignment\Create\Command as AddNewTagsToPost;
use App\UseCases\Service;

class PostManageService extends Service
{
    public function create(CreateRequest $request, int $userId): void
    {
        $postId = $this->commandBus->handle(new PostCreateCommand($request, $userId));
        $this->commandBus->handle(new AddExistingTagsToPost($request, $postId));
        $this->commandBus->handle(new AddNewTagsToPost($request, $postId));
    }

    public function update(UpdateRequest $request, Post $post): void
    {
        $this->commandBus->handle(new PostUpdateCommand($request, $post));
        $this->commandBus->handle(new AddExistingTagsToPost($request, $post->id));
        $this->commandBus->handle(new AddNewTagsToPost($request, $post->id));
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

    public function getTags()
    {
        $tags = ($this->queryBus->query(new FindTagsQuery()))->get();
        return $tags;
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