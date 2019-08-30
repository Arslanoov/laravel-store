<?php

namespace App\Command\Admin\Blog\Category\First;

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
        $this->categories->first($command->category, $command->first);
    }
}