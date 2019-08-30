<?php

namespace App\Query\Blog\Category\Find;

use App\ReadRepository\Blog\CategoryReadRepository;

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