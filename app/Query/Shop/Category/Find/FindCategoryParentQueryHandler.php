<?php

namespace App\Query\Shop\Category\Find;

use App\ReadRepository\Shop\CategoryReadRepository;

class FindCategoryParentQueryHandler
{
    private $categories;

    public function __construct(CategoryReadRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(FindCategoryParentQuery $query)
    {
        $parentCategory = $this->categories->find($query->id);
        return $parentCategory;
    }
}