<?php

namespace App\Query\User\Comparison\Exists;

use App\ReadRepository\User\ComparisonReadRepository;

class ComparisonItemExistsQueryHandler
{
    private $comparisonItems;

    public function __construct(ComparisonReadRepository $comparisonItems)
    {
        $this->comparisonItems = $comparisonItems;
    }

    public function __invoke(ComparisonItemExistsQuery $query)
    {
        $exists = $this->comparisonItems->existsByUserIdAndProductId(
            $query->userId,
            $query->productId
        );

        return $exists;
    }
}