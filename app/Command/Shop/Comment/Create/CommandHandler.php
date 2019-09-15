<?php

namespace App\Command\Shop\Comment\Create;

use App\Repository\Shop\CommentRepository;
use App\Repository\Shop\Product\ProductRepository;

class CommandHandler
{
    private $products;
    private $comments;

    public function __construct(ProductRepository $products, CommentRepository $comments)
    {
        $this->products = $products;
        $this->comments = $comments;
    }

    public function __invoke(Command $command)
    {
        $this->comments->create(
            $command->userId, $command->product->id,
            $command->parent, $command->text
        );

        $this->products->comment($command->product);
    }
}