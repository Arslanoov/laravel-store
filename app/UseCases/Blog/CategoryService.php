<?php

namespace App\UseCases\Blog;

use App\Command\CommandBus;
use App\Query\Blog\Category\Find\FindCategoriesTreeQuery;
use App\Query\Blog\Category\Find\FindCategoryBySlugQuery;
use App\Query\QueryBus;

class CategoryService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function getAllCategories()
    {
        $categories = $this->queryBus->query(new FindCategoriesTreeQuery());
        return $categories;
    }

    public function findCategoryBySlug(string $slug)
    {
        $category = $this->queryBus->query(new FindCategoryBySlugQuery($slug));
        return $category;
    }
}