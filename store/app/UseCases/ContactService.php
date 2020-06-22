<?php

namespace App\UseCases;

use App\Command\CommandBus;
use App\Http\Requests\Contact\SendRequest;
use App\Query\QueryBus;
use App\Command\Contact\Send\Command as SendContactMailCommand;

class ContactService extends Service
{
    public function send(SendRequest $request)
    {
        $this->commandBus->handle(new SendContactMailCommand($request));
    }
}