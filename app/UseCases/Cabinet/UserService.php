<?php

namespace App\UseCases\Cabinet;

use App\Entity\User\User;
use App\Http\Requests\Cabinet\Profile\FillRequest;
use App\UseCases\Service;
use App\Command\Cabinet\User\Rename\Command as RenameUserCommand;

class UserService extends Service
{
    public function changeName(FillRequest $request, User $user)
    {
        $this->commandBus->handle(new RenameUserCommand($user, $request));
    }
}