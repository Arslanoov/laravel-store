<?php

namespace App\UseCases\Cabinet;

use App\Entity\User\ComparisonItem;
use App\Entity\User\User;
use App\UseCases\Service;
use App\Command\Cabinet\Comparison\Create\Command as ComparisonItemCreateCommand;
use App\Command\Cabinet\Comparison\Remove\Command as ComparisonItemRemoveCommand;

class ComparisonService extends Service
{
    public function create(User $user, int $productId)
    {
        $this->commandBus->handle(new ComparisonItemCreateCommand($user, $productId));
    }
    
    public function remove(ComparisonItem $comparisonItem): void
    {
        $this->commandBus->handle(new ComparisonItemRemoveCommand($comparisonItem));
    }
}