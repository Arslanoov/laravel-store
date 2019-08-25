<?php

namespace App\Query\User;

use App\Entity\User\User;

class GetUserStatusesQueryHandler
{
    public function __invoke(GetUserStatusesQuery $query)
    {
        $statuses = User::statusesList();
        return $statuses;
    }
}