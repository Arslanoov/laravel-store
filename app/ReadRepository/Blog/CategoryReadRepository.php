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

    public function findBySlug(string $slug): ?Category
    {
        $category = Category::where('slug', $slug)->first();
        return $category;
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