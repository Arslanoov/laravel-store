<?php

namespace App\UseCases\Admin\Blog;

use App\Query\Blog\Category\Find\FindCategoriesQuery;
use App\Query\Blog\Category\Find\FindCategoryParentQuery;
use App\Query\Blog\Category\Find\FindCategoryParentsQuery;
use App\Query\Blog\Category\Find\FindCategorySiblingsDescQuery;
use App\Query\Blog\Category\Find\FindCategorySiblingsQuery;
use App\Entity\Blog\Category;
use App\Http\Requests\Admin\Blog\Category\CreateRequest;
use App\Http\Requests\Admin\Blog\Category\UpdateRequest;
use App\Command\Admin\Blog\Category\Create\Command as CategoryCreateCommand;
use App\Command\Admin\Blog\Category\Update\Command as CategoryUpdateCommand;
use App\Command\Admin\Blog\Category\Remove\Command as CategoryRemoveCommand;
use App\Command\Admin\Blog\Category\First\Command as CategoryFirstCommand;
use App\Command\Admin\Blog\Category\Up\Command as CategoryUpCommand;
use App\Command\Admin\Blog\Category\Down\Command as CategoryDownCommand;
use App\Command\Admin\Blog\Category\Last\Command as CategoryLastCommand;
use App\UseCases\Service;

class CategoryManageService extends Service
{
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

    public function first(Category $category, $first)
    {
        $this->commandBus->handle(new CategoryFirstCommand($category, $first));
    }

    public function up(Category $category)
    {
        $this->commandBus->handle(new CategoryUpCommand($category));
    }

    public function down(Category $category)
    {
        $this->commandBus->handle(new CategoryDownCommand($category));
    }

    public function last(Category $category, $last)
    {
        $this->commandBus->handle(new CategoryLastCommand($category, $last));
    }

    public function getSiblings(Category $category)
    {
        $siblings = $this->queryBus->query(new FindCategorySiblingsQuery($category));
        return $siblings;
    }

    public function getSiblingsDesc(Category $category)
    {
        $siblings = $this->queryBus->query(new FindCategorySiblingsDescQuery($category));
        return $siblings;
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