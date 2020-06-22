<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\Characteristic\Characteristic;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Characteristic\Characteristic\CreateRequest;
use App\Http\Requests\Admin\Shop\Characteristic\Characteristic\UpdateRequest;
use App\UseCases\Admin\Shop\Characteristic\CharacteristicManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CharacteristicController extends Controller
{
    private $service;

    public function __construct(CharacteristicManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getCharacteristics();
        $query = $this->search($request, $query);

        $characteristics = $query->paginate(20);
        $types = $this->service->getTypes();

        return view('admin.shop.characteristics.index', compact('characteristics', 'types'));
    }

    public function create()
    {
        $types = $this->service->getTypes();

        return view('admin.shop.characteristics.create', compact('types'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.shop.characteristics.index');
    }

    public function show(Characteristic $characteristic)
    {
        $variants = $this->service->getVariantsByCharacteristic($characteristic);

        return view('admin.shop.characteristics.show', compact('characteristic', 'variants'));
    }

    public function edit(Characteristic $characteristic)
    {
        $types = $this->service->getTypes();

        return view('admin.shop.characteristics.edit', compact('characteristic', 'types'));
    }

    public function update(UpdateRequest $request, Characteristic $characteristic)
    {
        $this->service->update($request, $characteristic);

        return redirect()->route('admin.shop.characteristics.show', $characteristic);
    }

    public function destroy(Characteristic $characteristic)
    {
        $this->service->remove($characteristic);

        return redirect()->route('admin.shop.characteristics.index');
    }

    private function search(Request $request, Builder $query): Builder
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('type'))) {
            $query->where('type', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('required'))) {
            $query->where('required', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('default'))) {
            $query->where('default', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('sort'))) {
            $query->where('sort', 'like', '%' . $value . '%');
        }

        return $query;
    }
}