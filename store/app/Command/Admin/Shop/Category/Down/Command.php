<?php

namespace App\Command\Admin\Shop\Category\Down;

use App\Entity\Shop\Category;

class Command
{
    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
}