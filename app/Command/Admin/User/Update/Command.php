<?php

namespace App\Command\Admin\User\Update;

use App\Entity\User\User;
use App\Http\Requests\Admin\User\UpdateRequest;

class Command
{
    public $username;
    public $email;

    public $user;

    public function __construct(
        UpdateRequest $request,
        User $user
    )
    {
        $this->username = $request->name;
        $this->email = $request->email;
        $this->user = $user;
    }
}