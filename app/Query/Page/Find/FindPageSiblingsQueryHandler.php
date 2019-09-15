<?php

namespace App\Query\Page\Find;

use App\ReadRepository\PageReadRepository;

class FindPageSiblingsQueryHandler
{
    private $pages;

    public function __construct(PageReadRepository $pages)
    {
        $this->pages = $pages;
    }

    public function __invoke(FindPageSiblingsQuery $command)
    {
        $this->pages->findSiblings($command->page);
    }
}