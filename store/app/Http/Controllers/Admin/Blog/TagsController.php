<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entity\Blog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Tag\CreateRequest;
use App\Http\Requests\Admin\Blog\Tag\UpdateRequest;
use App\UseCases\Admin\Blog\TagManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    private $service;

    public function __construct(TagManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getTags();
        $query = $this->search($request, $query);

        $tags = $query->paginate(20);

        return view('admin.blog.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.blog.tags.create');
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.blog.tags.index');
    }

    public function show(Tag $tag)
    {
        return view('admin.blog.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.blog.tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $this->service->update($request, $tag);

        return redirect()->route('admin.blog.tags.show', $tag);
    }

    public function destroy(Tag $tag)
    {
        $this->service->remove($tag);

        return redirect()->route('admin.blog.tags.index');
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