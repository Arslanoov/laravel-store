<?php

namespace App\Query\Blog\Category\Find;

use App\ReadRepository\Blog\CategoryReadRepository;

class FindCategoryBySlugQueryHandler
{
    private $categories;

    public function __construct(CategoryReadRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(FindCategoryBySlugQuery $query)
    {
        $category = $this->categories->findBySlug($query->slug);
        return $category;
    }
}