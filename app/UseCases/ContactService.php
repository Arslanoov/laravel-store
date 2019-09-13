<?php

namespace App\UseCases;

use App\Command\CommandBus;
use App\Http\Requests\Contact\SendRequest;
use App\Query\QueryBus;
use App\Command\Contact\Send\Command as SendContactMailCommand;

class ContactService
{
    private $commandBus;
    private $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function send(SendRequest $request)
    {
        $this->commandBus->handle(new SendContactMailCommand($request));
    }
}