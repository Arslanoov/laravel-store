<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\DeliveryMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\DeliveryMethod\CreateRequest;
use App\Http\Requests\Admin\Shop\DeliveryMethod\UpdateRequest;
use App\UseCases\Admin\Shop\DeliveryMethodManageService;

class DeliveryMethodsController extends Controller
{
    private $service;

    public function __construct(DeliveryMethodManageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $query = $this->service->getMethods();
        $deliveryMethods = $query->paginate(20);

        return view('admin.shop.deliveryMethods.index', compact('deliveryMethods'));
    }

    public function create()
    {
        return view('admin.shop.deliveryMethods.create');
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.shop.deliveryMethods.index');
    }

    public function show(DeliveryMethod $deliveryMethod)
    {
        return view('admin.shop.deliveryMethods.show', compact('deliveryMethod'));
    }

    public function edit(DeliveryMethod $deliveryMethod)
    {
        return view('admin.shop.deliveryMethods.edit', compact('deliveryMethod'));
    }

    public function update(UpdateRequest $request, DeliveryMethod $deliveryMethod)
    {
        $this->service->update($request, $deliveryMethod);

        return redirect()->route('admin.shop.deliveryMethods.show', $deliveryMethod);
    }

    public function destroy(DeliveryMethod $deliveryMethod)
    {
        $this->service->remove($deliveryMethod);

        return redirect()->route('admin.shop.deliveryMethods.index');
    }
}