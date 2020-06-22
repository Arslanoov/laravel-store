<?php

namespace App\Command\Admin\Shop\Category\Update;

use App\Repository\Shop\CategoryRepository;

class CommandHandler
{
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function __invoke(Command $command)
    {
        $this->categories->update(
            $command->category,
            $command->parent,
            $command->name,
            $command->slug,
            $command->title,
            $command->description
        );
    }
}