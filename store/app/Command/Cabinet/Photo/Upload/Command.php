<?php

namespace App\Command\Cabinet\Photo\Upload;

use App\Entity\User\User;
use App\Http\Requests\Cabinet\Photo\CreateRequest;

class Command
{
    public $user;
    public $file;

    public function __construct(User $user, CreateRequest $request)
    {
        $this->user = $user;
        $this->file = $request->file;
    }
}