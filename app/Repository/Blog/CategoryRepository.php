<?php

namespace App\Repository\Blog;

use App\Entity\Blog\Category;

class CategoryRepository
{
    public function create(
        $parent, $name, $slug,
        $title, $description
    ): Category
    {
        $category = Category::new(
            $parent, $name, $slug,
            $title, $description
        );

        return $category;
    }

    public function update(
        Category $category,
        $parent, $name, $slug,
        $title, $description
    ): void
    {
        $category->update([
            'parent_id' => $parent,
            'name' => $name,
            'slug' => $slug,
            'title' => $title,
            'description' => $description
        ]);
    }

    public function remove(Category $category): void
    {
        $category->delete();
    }
}