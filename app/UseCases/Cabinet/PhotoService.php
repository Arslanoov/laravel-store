<?php

namespace App\UseCases\Cabinet;

use App\Entity\User\User;
use App\Http\Requests\Cabinet\Photo\CreateRequest;
use App\UseCases\Service;
use App\Command\Cabinet\Photo\Upload\Command as UploadUserPhotoCommand;

class PhotoService extends Service
{
    public function create(CreateRequest $request, User $user)
    {
        $this->commandBus->handle(new UploadUserPhotoCommand($user, $request));
    }
}