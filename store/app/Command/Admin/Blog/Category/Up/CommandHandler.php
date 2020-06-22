<?php

namespace App\Command\Admin\Blog\Category\Up;

use App\Repository\Blog\CategoryRepository;

class CommandHandler
{
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(Command $command)
    {
        $this->categories->up($command->category);
    }
}