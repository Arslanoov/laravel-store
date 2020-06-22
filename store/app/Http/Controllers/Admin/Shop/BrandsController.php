<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Brand\CreateRequest;
use App\Http\Requests\Admin\Shop\Brand\UpdateRequest;
use App\UseCases\Admin\Shop\BrandManageService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BrandsController extends Controller
{
    private $service;

    public function __construct(BrandManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getBrands();
        $query = $this->search($request, $query);

        $brands = $query->paginate(20);

        return view('admin.shop.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.shop.brands.create');
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.shop.brands.index');
    }

    public function show(Brand $brand)
    {
        return view('admin.shop.brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.shop.brands.edit', compact('brand'));
    }

    public function update(UpdateRequest $request, Brand $brand)
    {
        $this->service->update($request, $brand);

        return redirect()->route('admin.shop.brands.show', $brand);
    }

    public function destroy(Brand $brand)
    {
        $this->service->remove($brand);

        return redirect()->route('admin.shop.brands.index');
    }

    private function search(Request $request, Builder $query): Builder
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('slug'))) {
            $query->where('slug', 'like', '%' . $value . '%');
        }

        return $query;
    }
}