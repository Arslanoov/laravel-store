<?php

namespace App\Command\Contact\Send;

use App\Http\Requests\Contact\SendRequest;

class Command
{
    public $name;
    public $email;
    public $message;

    public function __construct(SendRequest $request)
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->message = $request->message;
    }
}