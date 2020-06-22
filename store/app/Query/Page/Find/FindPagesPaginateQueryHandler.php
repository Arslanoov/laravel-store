<?php

namespace App\Query\Page\Find;

use App\ReadRepository\PageReadRepository;

class FindPagesPaginateQueryHandler
{
    private $pages;

    public function __construct(PageReadRepository $pages)
    {
        $this->pages = $pages;
    }

    public function __invoke(FindPagesPaginateQuery $query)
    {
        $pages = $this->pages->findAllPaginate();
        return $pages;
    }
}