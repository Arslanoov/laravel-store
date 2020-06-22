<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Entity\Shop\Product\Photo;
use App\Entity\Shop\Product\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Product\Photo\CreateRequest;
use App\UseCases\Admin\Shop\Product\PhotoManageService;

class PhotosController extends Controller
{
    private $service;

    public function __construct(PhotoManageService $service)
    {
        $this->service = $service;
    }

    public function store(CreateRequest $request, Product $product)
    {
        $this->service->create($request, $product);

        return redirect()->route('admin.shop.products.show', [
            'product' => $product,
            '#photos'
        ]);
    }

    public function destroy(Product $product, Photo $photo)
    {
        $this->service->remove($photo);

        return redirect()->route('admin.shop.products.show', [
            'product' => $product,
            '#photos'
        ]);
    }

    public function destroyAll(Product $product)
    {
        $this->service->removeAll($product);

        return redirect()->route('admin.shop.products.show', [
            'product' => $product,
            '#photos'
        ]);
    }
}