<?php

namespace App\Query\User\Find;

use App\ReadRepository\User\UserReadRepository;

class FindUsersQueryHandler
{
    private $users;

    public function __construct(UserReadRepository $users)
    {
        $this->users = $users;
    }

    public function __invoke(FindUsersQuery $query)
    {
        $users = $this->users->getAll();
        return $users;
    }
}