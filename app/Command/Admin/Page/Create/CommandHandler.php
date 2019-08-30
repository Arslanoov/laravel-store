<?php

namespace App\Command\Admin\Page\Create;

use App\Repository\PageRepository;

class CommandHandler
{
    private $pages;
    
    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;
    }

    public function __invoke(Command $command)
    {
        $this->pages->create(
            $command->title, $command->slug,
            $command->menuTitle, $command->parentId,
            $command->description, $command->text
        );
    }
}