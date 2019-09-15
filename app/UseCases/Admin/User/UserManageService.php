<?php

namespace App\UseCases\Admin\User;

use App\Command\Admin\User\Create\Command as UserCreateCommand;
use App\Command\Admin\User\Update\Command as UserUpdateCommand;
use App\Command\Admin\User\Remove\Command as UserRemoveCommand;
use App\Command\Auth\Verify\Command as UserVerifyCommand;
use App\Command\Admin\User\Draft\Command as UserDraftCommand;
use App\Command\Admin\User\Role\Command as UserChangeRoleCommand;
use App\Entity\User\User;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Query\User\Find\FindUsersQuery;
use App\Query\User\GetUserRolesQuery;
use App\Query\User\GetUserStatusesQuery;
use App\UseCases\Service;

class UserManageService extends Service
{
    public function create(CreateRequest $request): void
    {
        $this->commandBus->handle(new UserCreateCommand($request));
    }

    public function update(UpdateRequest $request, User $user): void
    {
        if ($request['role'] !== $user->role) {
            $this->commandBus->handle(new UserChangeRoleCommand($user, $request['role']));
        }

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

    public function getRoles(): array
    {
        $roles = $this->queryBus->query(new GetUserRolesQuery());
        return $roles;
    }
}