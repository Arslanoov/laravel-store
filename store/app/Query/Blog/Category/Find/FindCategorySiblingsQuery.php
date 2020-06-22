<?php

namespace App\Query\Blog\Category\Find;

use App\Entity\Blog\Category;

class FindCategorySiblingsQuery
{
    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
}