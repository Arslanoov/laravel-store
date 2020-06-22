<?php

namespace App\Query\User\Find;

class FindUserByEmailQuery
{
    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}