<?php

namespace App\Query\Page\Find;

use App\ReadRepository\PageReadRepository;

class FindPageSiblingsDescQueryHandler
{
    private $pages;

    public function __construct(PageReadRepository $pages)
    {
        $this->pages = $pages;
    }

    public function __invoke(FindPageSiblingsDescQuery $query)
    {
        $siblings = $this->pages->findSiblingsDesc($query->page);
        return $siblings;
    }
}