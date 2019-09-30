<?php

namespace App\UseCases\Cabinet;

use App\Entity\Shop\Characteristic\CharacteristicData;
use App\Entity\User\ComparisonItem;
use App\Entity\User\User;
use App\Query\User\Comparison\Exists\ComparisonItemExistsQuery;
use App\UseCases\Service;
use App\Command\Cabinet\Comparison\Create\Command as ComparisonItemCreateCommand;
use App\Command\Cabinet\Comparison\Remove\Command as ComparisonItemRemoveCommand;

class ComparisonService extends Service
{
    public function create(User $user, int $productId): void
    {
        $exists = $this->queryBus->query(new ComparisonItemExistsQuery($user, $productId));
        if (!$exists) {
            $this->commandBus->handle(new ComparisonItemCreateCommand($user, $productId));
        }
    }
    
    public function remove(ComparisonItem $comparisonItem): void
    {
        $this->commandBus->handle(new ComparisonItemRemoveCommand($comparisonItem));
    }

    public function getUniqueCharacteristics($comparisonItems): array
    {
        $characteristicsList = [];

        foreach ($comparisonItems as $comparisonItem) {
            foreach ($comparisonItem->product->characteristics as $characteristic) {
                $characteristicsList[$characteristic->characteristic->id] = new CharacteristicData(
                    $characteristic->characteristic->name,
                    $characteristic->variant ? $characteristic->variant->name : $characteristic->characteristic->default
                );
            }
        }

        return $characteristicsList;
    }
}