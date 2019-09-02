<?php

namespace App\UseCases\Admin\Shop;

use App\Command\CommandBus;
use App\Query\Shop\Category\Find\FindCategoriesQuery;
use App\Query\Shop\Category\Find\FindCategoryParentQuery;
use App\Query\Shop\Category\Find\FindCategoryParentsQuery;
use App\Query\Shop\Category\Find\FindCategorySiblingsDescQuery;
use App\Query\Shop\Category\Find\FindCategorySiblingsQuery;
use App\Query\QueryBus;
use App\Entity\Shop\Category;
use App\Http\Requests\Admin\Shop\Category\CreateRequest;
use App\Http\Requests\Admin\Shop\Category\UpdateRequest;
use App\Command\Admin\Shop\Category\Create\Command as CategoryCreateCommand;
use App\Command\Admin\Shop\Category\Update\Command as CategoryUpdateCommand;
use App\Command\Admin\Shop\Category\Remove\Command as CategoryRemoveCommand;
use App\Command\Admin\Shop\Category\First\Command as CategoryFirstCommand;
use App\Command\Admin\Shop\Category\Up\Command as CategoryUpCommand;
use App\Command\Admin\Shop\Category\Down\Command as CategoryDownCommand;
use App\Command\Admin\Shop\Category\Last\Command as CategoryLastCommand;

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