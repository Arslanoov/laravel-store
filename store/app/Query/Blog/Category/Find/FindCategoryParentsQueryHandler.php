<?php

namespace App\Query\Blog\Category\Find;

use App\ReadRepository\Blog\CategoryReadRepository;

class FindCategoryParentsQueryHandler
{
    private $categories;

    public function __construct(CategoryReadRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(FindCategoryParentsQuery $query)
    {
        $parentCategories = $this->categories->findParents();
        return $parentCategories;
    }
}