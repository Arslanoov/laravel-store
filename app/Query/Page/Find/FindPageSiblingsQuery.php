<?php

namespace App\Query\Page\Find;

use App\Entity\Page;

class FindPageSiblingsQuery
{
    public $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }
}