<?php

namespace App\Command\Admin\User\Create;

use App\Http\Requests\Admin\User\CreateRequest;

class Command
{
    public $username;
    public $email;
    public $password;

    public function __construct(CreateRequest $request)
    {
        $this->username = $request->name;
        $this->email = $request->email;
        $this->password = $request->password;
    }
}