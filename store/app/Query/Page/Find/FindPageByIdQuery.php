<?php

namespace App\Query\Page\Find;

class FindPageByIdQuery
{
    public $id;

    public function __construct($id)
    {
        $this->id  =$id;
    }
}