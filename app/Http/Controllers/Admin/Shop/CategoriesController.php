<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Category\CreateRequest;
use App\Http\Requests\Admin\Shop\Category\UpdateRequest;
use App\UseCases\Admin\Shop\CategoryManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $service;

    public function __construct(CategoryManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getCategories();
        $query = $this->search($request, $query);

        $categories = $query->paginate(20);

        return view('admin.shop.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = $this->service->getParentCategories();

        return view('admin.shop.categories.create', compact('parents'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.shop.categories.index');
    }

    public function show(Category $category)
    {
        $parentCategory = $this->service->getParentCategory($category->parent->id ?? null);

        return view('admin.shop.categories.show', compact('category', 'parentCategory'));
    }

    public function edit(Category $category)
    {
        $parents = $this->service->getParentCategories();

        return view('admin.shop.categories.edit', compact('category', 'parents'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $this->service->update($request, $category);

        return redirect()->route('admin.shop.categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $this->service->remove($category);

        return redirect()->route('admin.shop.categories.index');
    }

    public function first(Category $category)
    {
        $first = $this->service->getSiblings($category);
        if ($first) {
            $this->service->first($category, $first);
        }

        return redirect()->route('admin.shop.categories.index');
    }

    public function up(Category $category)
    {
        $this->service->up($category);

        return redirect()->route('admin.shop.categories.index');
    }

    public function down(Category $category)
    {
        $this->service->down($category);

        return redirect()->route('admin.shop.categories.index');
    }

    public function last(Category $category)
    {
        $last = $this->service->getSiblingsDesc($category);
        if ($last) {
            $this->service->last($category, $last);
        }

        return redirect()->route('admin.shop.categories.index');
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

        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }

        return $query;
    }
}