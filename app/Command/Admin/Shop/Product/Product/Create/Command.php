<?php

namespace App\Command\Admin\Shop\Product\Product\Create;

use App\Http\Requests\Admin\Shop\Product\Product\CreateRequest;

class Command
{
    public $categoryId;
    public $brandId;
    public $title;
    public $slug;
    public $price;
    public $text;
    public $weight;
    
    public function __construct(CreateRequest $request)
    {
        $this->categoryId = $request->category;
        $this->brandId = $request->brand;
        $this->title = $request->title;
        $this->slug = $request->slug;
        $this->price = $request->price;
        $this->text = $request->text;
        $this->weight = $request->weight;
    }
}