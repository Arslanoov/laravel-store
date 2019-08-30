<?php

namespace App\Command\Admin\Blog\Category\Up;

use App\Entity\Blog\Category;

class Command
{
    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
}