<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Region;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Region\CreateRequest;
use App\Http\Requests\Admin\Region\UpdateRequest;
use App\UseCases\Admin\Region\RegionManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    private $service;

    public function __construct(RegionManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getRegions();
        $query = $this->search($request, $query);

        $regions = $query->paginate(20);

        return view('admin.regions.index', compact('regions'));
    }

    public function create()
    {
        $parents = $this->service->getRegionsList();

        return view('admin.regions.create', compact('parents'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.regions.index');
    }

    public function show(Region $region)
    {
        return view('admin.regions.show', compact('region'));
    }

    public function edit(Region $region)
    {
        $parents = $this->service->getRegionsList();

        return view('admin.regions.edit', compact('region', 'parents'));
    }

    public function update(UpdateRequest $request, Region $region)
    {
        $this->service->update($request, $region);

        return redirect()->route('admin.regions.show', $region);
    }

    public function destroy(Region $region)
    {
        $this->service->remove($region);

        return redirect()->route('admin.regions.index');
    }

    private function search(Request $request, Builder $query): Builder
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('parentId'))) {
            $query->where('parent_id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        return $query;
    }
}