<?php

namespace App\Query\Blog\Category\Find;

use App\Entity\Blog\Category;

class FindCategorySiblingsDescQuery
{
    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
}