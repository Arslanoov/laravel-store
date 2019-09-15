<?php

namespace App\UseCases\Auth;

use App\Command\Auth\Register\Command as RegisterCommand;
use App\Command\Auth\Verify\Command as VerifyCommand;
use App\Entity\User\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Query\User\Find\FindUserByEmailQuery;
use App\Query\User\Find\FindUserByIdQuery;
use App\Query\User\Find\FindUserByVerifyTokenQuery;
use App\UseCases\Service;

class RegisterService extends Service
{
    public function register(RegisterRequest $request): void
    {
        $this->commandBus->handle(new RegisterCommand($request));
    }

    public function verify($userId): void
    {
        $user = $this->queryBus->query(new FindUserByIdQuery($userId));
        $this->commandBus->handle(new VerifyCommand($user));
    }

    public function findUserByToken($token): ?User
    {
        return $this->queryBus->query(new FindUserByVerifyTokenQuery($token));
    }

    public function findUserByEmail($email): ?User
    {
        return $this->queryBus->query(new FindUserByEmailQuery($email));
    }
}