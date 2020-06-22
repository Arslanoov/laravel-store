<?php

namespace App\Command\Cabinet\User\Rename;

use App\Entity\User\User;
use App\Http\Requests\Cabinet\Profile\FillRequest;

class Command
{
    public $name;

    public $user;

    public function __construct(User $user, FillRequest $request)
    {
        $this->user = $user;
        $this->name = $request->name;
    }
}