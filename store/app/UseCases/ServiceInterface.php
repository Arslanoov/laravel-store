<?php

namespace App\UseCases;

use App\Command\CommandBus;
use App\Query\QueryBus;

interface ServiceInterface
{
    public function __construct(CommandBus $commandBus, QueryBus $queryBus);
}