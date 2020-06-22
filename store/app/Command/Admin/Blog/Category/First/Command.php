<?php

namespace App\Command\Admin\Blog\Category\First;

use App\Entity\Blog\Category;

class Command
{
    public $category;
    public $first;

    public function __construct(Category $category, $first)
    {
        $this->category = $category;
        $this->first = $first;
    }
}