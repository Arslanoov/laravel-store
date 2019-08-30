<?php

namespace App\Command\Admin\Page\Down;

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
        $this->pages->down($command->page);
    }
}