<?php

namespace App\Query\User\Find;

class FindUserByIdQuery
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}