<?php

namespace App\Query\Shop\Category\Find;

use App\ReadRepository\Shop\CategoryReadRepository;

class FindCategorySiblingsDescQueryHandler
{
    private $categories;

    public function __construct(CategoryReadRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(FindCategorySiblingsDescQuery $query)
    {
        $siblings = $this->categories->findSiblingsDesc($query->category);
        return $siblings;
    }
}