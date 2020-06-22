<?php

namespace App\Query\User\Find;

use App\ReadRepository\User\UserReadRepository;

class FindUserByIdQueryHandler
{
    private $users;

    public function __construct(UserReadRepository $users)
    {
        $this->users = $users;
    }

    public function __invoke(FindUserByIdQuery $query)
    {
        $user = $this->users->find($query->id);
        return $user;
    }
}