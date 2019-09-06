<?php

namespace App\Command\Admin\Shop\Product\Product\Update;

use App\Entity\Shop\Product\Product;
use App\Http\Requests\Admin\Shop\Product\Product\UpdateRequest;

class Command
{
    public $categoryId;
    public $brandId;
    public $availability;
    public $title;
    public $slug;
    public $price;
    public $content;

    public $product;
    
    public function __construct(UpdateRequest $request, Product $product)
    {
        $this->categoryId = $request->category;
        $this->brandId = $request->brand;
        $this->title = $request->title;
        $this->slug = $request->slug;
        $this->price = $request->price;
        $this->content = $request->text;
        $this->product = $product;
    }
}