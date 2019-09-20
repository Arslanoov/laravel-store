<?php

namespace App\UseCases\Cabinet;

use App\Entity\User\Profile;
use App\Query\Cabinet\Profile\Find\FindProfileByUserIdQuery;
use App\UseCases\Service;
use App\Http\Requests\Cabinet\Profile\FillRequest;
use App\Command\Cabinet\Profile\Fill\Command as FillProfileCommand;

class ProfileService extends Service
{
    public function fill(FillRequest $request, Profile $profile)
    {
        $this->commandBus->handle(new FillProfileCommand($request, $profile));
    }

    public function findProfileByUserId(int $userId)
    {
        $profile = $this->queryBus->query(new FindProfileByUserIdQuery($userId));
        return $profile;
    }
}