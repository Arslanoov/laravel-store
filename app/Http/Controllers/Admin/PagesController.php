<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Page\CreateRequest;
use App\Http\Requests\Admin\Page\UpdateRequest;
use App\UseCases\Admin\PageService;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $service;

    public function __construct(PageService $service)
    {
        $this->middleware('can:manage-pages');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getPagesPaginate();
        $query = $this->search($request, $query);

        $pages = $query->paginate(20);

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $parents = $this->service->getPages();

        return view('admin.pages.create', compact('parents'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.pages.index');
    }

    public function show(Page $page)
    {
        $parentPage = $this->service->getPage($page->parent_id);

        return view('admin.pages.show', compact('page', 'parentPage'));
    }

    public function edit(Page $page)
    {
        $parents = $this->service->getPages();

        return view('admin.pages.edit', compact('page', 'parents'));
    }

    public function update(UpdateRequest $request, Page $page)
    {
        $this->service->update($request, $page);

        return redirect()->route('admin.pages.show', $page);
    }

    public function first(Page $page)
    {
        $first = $this->service->getSiblings($page);
        if ($first) {
            $this->service->first($page, $first);
        }

        return redirect()->route('admin.pages.index');
    }

    public function up(Page $page)
    {
        $this->service->up($page);

        return redirect()->route('admin.pages.index');
    }

    public function down(Page $page)
    {
        $this->service->down($page);

        return redirect()->route('admin.pages.index');
    }

    public function last(Page $page)
    {
        $last = $this->service->getSiblingsDesc($page);
        if ($last) {
            $this->service->last($page, $last);
        }

        return redirect()->route('admin.pages.index');
    }

    public function destroy(Page $page)
    {
        $this->service->remove($page);

        return redirect()->route('admin.pages.index');
    }

    private function search(Request $request, $query)
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('menu_title'))) {
            $query->where('menu_title', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('slug'))) {
            $query->where('slug', 'like', '%' . $value . '%');
        }

        return $query;
    }
}