<?php

namespace App\UseCases\Shop;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Shop\Comment\CreateRequest;
use App\UseCases\Service;
use App\Command\Shop\Comment\Create\Command as CommentCreateCommand;

class CommentService extends Service
{
    public function create(CreateRequest $request, Product $product, int $userId): void
    {
        $this->commandBus->handle(new CommentCreateCommand($request, $product, $userId));
    }
}