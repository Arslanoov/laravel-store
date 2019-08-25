<?php

namespace App\UseCases\Admin\User;

use App\Command\Admin\User\Create\Command as UserCreateCommand;
use App\Command\Admin\User\Update\Command as UserUpdateCommand;
use App\Command\Admin\User\Remove\Command as UserRemoveCommand;
use App\Command\Auth\Verify\Command as UserVerifyCommand;
use App\Command\Admin\User\Draft\Command as UserDraftCommand;
use App\Command\CommandBus;
use App\Query\QueryBus;
use App\Entity\User\User;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Query\User\Find\FindUsersQuery;
use App\Query\User\GetUserStatusesQuery;

class UserManageService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(CreateRequest $request): void
    {
        $this->commandBus->handle(new UserCreateCommand($request));
    }

    public function update(UpdateRequest $request, User $user): void
    {
        $this->commandBus->handle(new UserUpdateCommand($request, $user));
    }

    public function remove(User $user): void
    {
        $this->commandBus->handle(new UserRemoveCommand($user));
    }

    public function verify(User $user): void
    {
        $this->commandBus->handle(new UserVerifyCommand($user));
    }

    public function draft(User $user): void
    {
        $this->commandBus->handle(new UserDraftCommand($user));
    }

    public function getUsers()
    {
        $users = $this->queryBus->query(new FindUsersQuery());
        return $users;
    }

    public function getStatuses(): array
    {
        $statuses = $this->queryBus->query(new GetUserStatusesQuery());
        return $statuses;
    }
}