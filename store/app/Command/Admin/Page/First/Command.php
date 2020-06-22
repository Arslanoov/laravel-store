<?php

namespace App\Command\Admin\Page\First;

use App\Entity\Page;

class Command
{
    public $page;
    public $first;

    public function __construct(Page $page, $first)
    {
        $this->page = $page;
        $this->first = $first;
    }
}