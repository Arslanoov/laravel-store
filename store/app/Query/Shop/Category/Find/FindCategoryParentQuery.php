<?php

namespace App\Query\Shop\Category\Find;

class FindCategoryParentQuery
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}