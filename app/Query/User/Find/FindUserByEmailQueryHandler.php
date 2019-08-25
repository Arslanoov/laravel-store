<?php

namespace App\Query\User\Find;

use App\ReadRepository\User\UserReadRepository;

class FindUserByEmailQueryHandler
{
    private $users;

    public function __construct(UserReadRepository $users)
    {
        $this->users = $users;
    }

    public function __invoke(FindUserByEmailQuery $query)
    {
        $user = $this->users->findByEmail($query->email);
        return $user;
    }
}