<?php

namespace App\Query\Shop\Category\Find;

use App\ReadRepository\Shop\CategoryReadRepository;

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