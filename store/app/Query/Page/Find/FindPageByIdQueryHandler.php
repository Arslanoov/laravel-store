<?php

namespace App\Query\Page\Find;

use App\ReadRepository\PageReadRepository;

class FindPageByIdQueryHandler
{
    private $pages;

    public function __construct(PageReadRepository $pages)
    {
        $this->pages = $pages;
    }

    public function __invoke(FindPageByIdQuery $query)
    {
        $page = $this->pages->find($query->id);
        return $page;
    }
}