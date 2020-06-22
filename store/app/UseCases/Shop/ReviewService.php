<?php

namespace App\UseCases\Shop;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Shop\Review\CreateRequest;
use App\UseCases\Service;
use App\Command\Shop\Review\Create\Command as ReviewCreateCommand;

class ReviewService extends Service
{
    public function create(CreateRequest $request, Product $product, int $userId)
    {
        $this->commandBus->handle(new ReviewCreateCommand($request, $product, $userId));
    }
}