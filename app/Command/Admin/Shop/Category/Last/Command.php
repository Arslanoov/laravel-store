<?php

namespace App\Command\Admin\Shop\Category\Last;

use App\Entity\Shop\Category;

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