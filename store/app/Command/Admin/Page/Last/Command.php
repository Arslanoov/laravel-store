<?php

namespace App\Command\Admin\Page\Last;

use App\Entity\Page;

class Command
{
    public $page;
    public $last;

    public function __construct(Page $page, $last)
    {
        $this->page = $page;
        $this->last = $last;
    }
}