<?php

namespace App\Query\Blog\Category\Find;

class FindCategoryParentQuery
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}