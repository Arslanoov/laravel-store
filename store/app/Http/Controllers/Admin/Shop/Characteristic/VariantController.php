<?php

namespace App\Http\Controllers\Admin\Shop\Characteristic;

use App\Entity\Shop\Characteristic\Characteristic;
use App\Entity\Shop\Characteristic\Variant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Characteristic\Variant\CreateRequest;
use App\Http\Requests\Admin\Shop\Characteristic\Variant\UpdateRequest;
use App\UseCases\Admin\Shop\Characteristic\VariantManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    private $service;

    public function __construct(VariantManageService $service)
    {
        $this->service = $service;
    }

    public function create(Characteristic $characteristic)
    {
        return view('admin.shop.characteristics.variants.create', compact('characteristic'));
    }

    public function store(CreateRequest $request, Characteristic $characteristic)
    {
        $this->service->create($request, $characteristic);

        return redirect()->route('admin.shop.characteristics.show', $characteristic);
    }

    public function show(Characteristic $characteristic, Variant $variant)
    {
        return view('admin.shop.characteristics.variants.show', compact('variant', 'characteristic'));
    }

    public function edit(Characteristic $characteristic, Variant $variant)
    {
        return view('admin.shop.characteristics.variants.edit', compact('variant', 'characteristic'));
    }

    public function update(UpdateRequest $request, Characteristic $characteristic, Variant $variant)
    {
        $this->service->update($request, $variant);

        return redirect()->route('admin.shop.characteristics.variants.show', compact('variant', 'characteristic'));
    }

    public function destroy(Characteristic $characteristic, Variant $variant)
    {
        $this->service->remove($variant);

        return redirect()->route('admin.shop.characteristics.show', $characteristic);
    }
}