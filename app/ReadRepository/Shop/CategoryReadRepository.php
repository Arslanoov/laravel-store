<?php

namespace App\ReadRepository\Shop;

use App\Entity\Shop\Category;

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

    public function findSiblings(Category $category)
    {
        $siblings = $category->siblings()->defaultOrder()->first();
        return $siblings;
    }

    public function findSiblingsDesc(Category $category)
    {
        $siblings = $category->siblings()->defaultOrder('desc')->first();
        return $siblings;
    }
}