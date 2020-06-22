<?php

namespace App\Command\Admin\Shop\Comment\Remove;

use App\Entity\Shop\Comment;
use App\Entity\Shop\Product\Product;

class Command
{
    public $product;
    public $comment;

    public function __construct(Product $product, Comment $comment)
    {
        $this->product = $product;
        $this->comment = $comment;
    }
}