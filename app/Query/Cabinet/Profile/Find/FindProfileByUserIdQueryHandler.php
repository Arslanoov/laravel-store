<?php

namespace App\Query\Cabinet\Profile\Find;

use App\ReadRepository\User\ProfileReadRepository;

class FindProfileByUserIdQueryHandler
{
    private $profiles;

    public function __construct(ProfileReadRepository $profiles)
    {
        $this->profiles = $profiles;
    }

    public function __invoke(FindProfileByUserIdQuery $query)
    {
        $profile = $this->profiles->findByUserId($query->userId);
        return $profile;
    }
}