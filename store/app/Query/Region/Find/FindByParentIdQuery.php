<?php

namespace App\Query\Region\Find;

class FindByParentIdQuery
{
    public $parentId;

    public function __construct(int $parentId)
    {
        $this->parentId = $parentId;
    }
}