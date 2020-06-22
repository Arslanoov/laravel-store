<?php

namespace App\Command\Admin\Shop\Comment\Remove;

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
        if ($command->comment->children()->exists()) {
            $this->comments->draft($command->comment);
        } else {
            $this->comments->remove($command->comment);
            $this->products->removeComment($command->product);
        }
    }
}