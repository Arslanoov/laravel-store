<?php

namespace App\Command\Newsletter\Email\Add;

use App\Http\Requests\Newsletter\AddEmailRequest;

class Command
{
    public $email;

    public function __construct(AddEmailRequest $request)
    {
        $this->email = $request->email;
    }
}