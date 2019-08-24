<?php

namespace App\Command\Auth\Register;

use App\Http\Requests\Auth\RegisterRequest;

class Command
{
    public $name;
    public $email;
    public $password;

    public function __construct(RegisterRequest $request)
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = $request->password;
    }
}