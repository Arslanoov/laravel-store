<?php

namespace App\Query\Shop\Category\Find;

use App\ReadRepository\Shop\CategoryReadRepository;

class FindCategorySiblingsQueryHandler
{
    private $categories;

    public function __construct(CategoryReadRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(FindCategorySiblingsQuery $command)
    {
        $this->categories->findSiblings($command->category);
    }
}