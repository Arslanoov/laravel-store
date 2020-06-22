<?php

namespace App\UseCases\Blog;

use App\Query\Blog\Category\Find\FindCategoriesTreeQuery;
use App\UseCases\Service;

class CategoryService extends Service
{
    public function getAllCategories()
    {
        $categories = $this->queryBus->query(new FindCategoriesTreeQuery());
        return $categories;
    }
}