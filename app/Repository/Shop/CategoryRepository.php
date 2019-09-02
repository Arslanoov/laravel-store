<?php

namespace App\Repository\Shop;

use App\Entity\Shop\Category;

class CategoryRepository
{
    public function create(
        $parent, $name, $slug,
        $title, $description
    ): Category
    {
        $category = Category::new(
            $parent, $name,
            $slug, $title,
            $description
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

    public function first(Category $category, $first): void
    {
        $category->insertBeforeNode($first);
    }

    public function up(Category $category): void
    {
        $category->up();
    }

    public function down(Category $category): void
    {
        $category->down();
    }

    public function last(Category $category, $last): void
    {
        $category->insertAfterNode($last);
    }
}