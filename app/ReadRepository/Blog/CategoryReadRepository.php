<?php

namespace App\ReadRepository\Blog;

use App\Entity\Blog\Category;

class CategoryReadRepository
{
    public function find($id): ?Category
    {
        $category = Category::find($id);
        return $category;
    }

    public function findAll()
    {
        $categories = Category::orderByDesc('id');
        return $categories;
    }

    public function findParents()
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        return $parents;
    }

    public function getTree()
    {
        $categoriesTree = Category::defaultOrder()->withDepth()->get()->toTree();
        return $categoriesTree;
    }
}