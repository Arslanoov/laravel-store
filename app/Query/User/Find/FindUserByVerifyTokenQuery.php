<?php

namespace App\Query\User\Find;

class FindUserByVerifyTokenQuery
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }
}