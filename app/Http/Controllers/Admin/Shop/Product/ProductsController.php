<?php

namespace App\Http\Controllers\Admin\Shop\Product;

use App\Entity\Shop\Product\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Product\Product\CreateRequest;
use App\Http\Requests\Admin\Shop\Product\Product\UpdateRequest;
use App\UseCases\Admin\Shop\Product\ProductManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $service;

    public function __construct(ProductManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getProducts();
        $query = $this->search($request, $query);

        $products = $query->paginate(20);

        $availabilitiesList = $this->service->getAvailabilitiesList();
        $statusesList = $this->service->getStatusesList();

        return view('admin.shop.products.index', compact('products', 'availabilitiesList', 'statusesList'));
    }

    public function create()
    {
        $categories = $this->service->getCategoryTree();
        $brands = $this->service->getBrands();

        return view('admin.shop.products.create', compact('categories', 'brands'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.shop.products.index');
    }

    public function show(Product $product)
    {
        return view('admin.shop.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = $this->service->getCategoryTree();
        $brands = $this->service->getBrands();

        return view('admin.shop.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $this->service->update($request, $product);

        return redirect()->route('admin.shop.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $this->service->remove($product);

        return redirect()->route('admin.shop.products.index');
    }

    public function activate(Product $product)
    {
        $this->service->activate($product);

        return redirect()->route('admin.shop.products.show', $product);
    }

    public function draft(Product $product)
    {
        $this->service->draft($product);

        return redirect()->route('admin.shop.products.show', $product);
    }

    public function available(Product $product)
    {
        $this->service->makeAvailable($product);

        return redirect()->route('admin.shop.products.show', $product);
    }

    public function unavailable(Product $product)
    {
        $this->service->makeUnavailable($product);

        return redirect()->route('admin.shop.products.show', $product);
    }

    private function search(Request $request, Builder $query): Builder
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('availability'))) {
            $query->where('availability', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('slug'))) {
            $query->where('slug', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('price'))) {
            $query->where('price', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', 'like', '%' . $value . '%');
        }

        return $query;
    }
}