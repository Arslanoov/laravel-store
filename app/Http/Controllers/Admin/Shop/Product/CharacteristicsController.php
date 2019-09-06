<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Entity\Shop\Product\Characteristic;
use App\Entity\Shop\Product\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Product\Characteristic\CreateRequest;
use App\Http\Requests\Admin\Shop\Product\Characteristic\CreateVariantRequest;
use App\UseCases\Admin\Shop\Product\CharacteristicManageService;

class CharacteristicsController extends Controller
{
    private $service;

    public function __construct(CharacteristicManageService $service)
    {
        $this->service = $service;
    }

    public function create(Product $product)
    {
        $characteristics = $this->service->getCharacteristics();

        return view('admin.shop.products.characteristics.create', compact('product', 'characteristics'));
    }

    public function store(CreateRequest $request, Product $product)
    {
        $this->service->create($request, $product);

        return redirect()->route('admin.shop.products.show', [
            'product' => $product,
            '#characteristcs'
        ]);
    }

    public function addVariant(Product $product, Characteristic $characteristic)
    {
        $variants = $this->service->getVariants($characteristic->characteristic);

        return view('admin.shop.products.characteristics.addVariant', compact('product', 'characteristic', 'variants'));
    }

    public function storeVariant(CreateVariantRequest $request, Product $product, Characteristic $characteristic)
    {
        $this->service->addVariant($request, $characteristic);

        return redirect()->route('admin.shop.products.show', [
            'product' => $product,
            '#characteristics'
        ]);
    }

    public function destroy(Product $product, Characteristic $characteristic)
    {
        $this->service->remove( $characteristic);

        return redirect()->route('admin.shop.products.show', [
            'product' => $product,
            '#characteristics'
        ]);
    }
}