<?php

namespace App\Query\Shop\Category\Find;

use App\Entity\Shop\Category;

class FindCategorySiblingsDescQuery
{
    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
}