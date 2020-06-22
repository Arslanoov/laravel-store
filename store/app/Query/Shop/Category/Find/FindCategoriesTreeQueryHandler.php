<?php

namespace App\Query\Shop\Category\Find;

use App\ReadRepository\Shop\CategoryReadRepository;

class FindCategoriesTreeQueryHandler
{
    private $categories;

    public function __construct(CategoryReadRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(FindCategoriesTreeQuery $query)
    {
        $categoriesTree = $this->categories->getTree();
        return $categoriesTree;
    }
}