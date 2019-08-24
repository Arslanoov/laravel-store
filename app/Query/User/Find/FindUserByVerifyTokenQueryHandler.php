<?php

namespace App\Query\User\Find;

use App\ReadRepository\User\UserReadRepository;

class FindUserByVerifyTokenQueryHandler
{
    private $users;

    public function __construct(UserReadRepository $users)
    {
        $this->users = $users;
    }

    public function __invoke(FindUserByVerifyTokenQuery $query)
    {
        $user = $this->users->findByToken($query->token);
        return $user;
    }
}