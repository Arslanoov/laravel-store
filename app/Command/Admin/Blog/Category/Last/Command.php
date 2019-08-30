<?php

namespace App\Command\Admin\Blog\Category\Last;

use App\Entity\Blog\Category;

class Command
{
    public $category;
    public $last;

    public function __construct(Category $category, $last)
    {
        $this->category = $category;
        $this->last = $last;
    }
}