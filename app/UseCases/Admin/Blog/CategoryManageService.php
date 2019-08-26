<?php

namespace App\UseCases\Admin\Blog;

use App\Command\CommandBus;
use App\Query\Blog\Category\Find\FindCategoriesQuery;
use App\Query\Blog\Category\Find\FindCategoryParentQuery;
use App\Query\Blog\Category\Find\FindCategoryParentsQuery;
use App\Query\QueryBus;
use App\Entity\Blog\Category;
use App\Http\Requests\Admin\Blog\Category\CreateRequest;
use App\Http\Requests\Admin\Blog\Category\UpdateRequest;
use App\Command\Admin\Blog\Category\Create\Command as CategoryCreateCommand;
use App\Command\Admin\Blog\Category\Update\Command as CategoryUpdateCommand;
use App\Command\Admin\Blog\Category\Remove\Command as CategoryRemoveCommand;

class CategoryManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(CreateRequest $request): void
    {
        $this->commandBus->handle(new CategoryCreateCommand($request));
    }

    public function update(UpdateRequest $request, Category $category): void
    {
        $this->commandBus->handle(new CategoryUpdateCommand($category, $request));
    }

    public function remove(Category $category): void
    {
        $this->commandBus->handle(new CategoryRemoveCommand($category));
    }

    public function getCategories()
    {
        $users = $this->queryBus->query(new FindCategoriesQuery());
        return $users;
    }

    public function getParentCategories()
    {
        $parentCategories = $this->queryBus->query(new FindCategoryParentsQuery());
        return $parentCategories;
    }

    public function getParentCategory($id)
    {
        if (!$id) {
            return;
        }

        $parentCategory = $this->queryBus->query(new FindCategoryParentQuery($id));
        return $parentCategory;
    }
}