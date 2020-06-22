<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\SearchRequest;
use App\UseCases\Shop\Product\SearchService;

class SearchController extends Controller
{
    private $service;

    public function __construct(SearchService $service)
    {
        $this->service = $service;
    }

    public function search(SearchRequest $request)
    {
        $products = $this->service->search(
            $request,
            10,
            $request->get('page', 1)
        );

        return view('shop.products.search', compact('products'));
    }
}