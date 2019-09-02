<?php

namespace App\Command\Admin\Shop\Category\First;

use App\Entity\Shop\Category;

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