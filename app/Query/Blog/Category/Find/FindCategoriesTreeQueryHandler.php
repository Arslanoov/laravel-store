<?php

namespace App\Query\Blog\Category\Find;

use App\ReadRepository\Blog\CategoryReadRepository;

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