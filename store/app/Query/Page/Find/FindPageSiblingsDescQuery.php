<?php

namespace App\Query\Page\Find;

use App\Entity\Page;

class FindPageSiblingsDescQuery
{
    public $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }
}