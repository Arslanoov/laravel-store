<?php

namespace App\Query\Page\Find;

use App\ReadRepository\PageReadRepository;

class FindPagesQueryHandler
{
    private $pages;

    public function __construct(PageReadRepository $pages)
    {
        $this->pages = $pages;
    }

    public function __invoke(FindPagesQuery $query)
    {
        $pages = $this->pages->findAll();
        return $pages;
    }
}