<?php

namespace App\Command\Admin\Page\First;

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
        $this->pages->first($command->page, $command->first);
    }
}