<?php

namespace App\Command\Admin\Blog\Category\Remove;

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
        $this->categories->remove($command->category);
    }
}