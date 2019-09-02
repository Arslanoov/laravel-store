<?php

namespace App\Query\Shop\Category\Find;

use App\ReadRepository\Shop\CategoryReadRepository;

class FindCategoriesQueryHandler
{
    private $categories;

    public function __construct(CategoryReadRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke()
    {
        $categories = $this->categories->findAll();
        return $categories;
    }
}