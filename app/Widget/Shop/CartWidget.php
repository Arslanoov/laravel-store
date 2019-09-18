<?php

namespace App\Widget\Shop;

use App\Services\CartService;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;

class CartWidget extends AbstractWidget
{
    protected $config = [];

    private $service;

    public function __construct(CartService $service, array $config = [])
    {
        parent::__construct($config);
        $this->service = $service;
    }

    public function run()
    {
        if (!Auth::guard()->guest()) {
            $productsCount = $this->service->findCartItemsCountByUserId(Auth::guard()->id());

            return view('widgets.shop.cart', compact('productsCount'));
        }
    }
}