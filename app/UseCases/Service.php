<?php

namespace App\UseCases;

use App\Command\CommandBus;
use App\Query\QueryBus;

abstract class Service implements ServiceInterface
{
    protected $commandBus;
    protected $queryBus;

    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }
}