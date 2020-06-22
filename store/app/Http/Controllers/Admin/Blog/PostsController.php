<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entity\Blog\Category;
use App\Entity\Blog\Post\Post;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\CreateRequest;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\UseCases\Admin\Blog\PostManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    private $service;

    public function __construct(PostManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getPosts();
        $query = $this->search($request, $query);

        $posts = $query->paginate(20);
        $statuses = $this->service->getStatuses();

        return view('admin.blog.posts.index', compact('posts', 'statuses'));
    }

    public function create()
    {
        $categories = $this->service->getCategoryTree();
        $tags = $this->service->getTags();

        return view('admin.blog.posts.create', compact('categories', 'tags'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request, Auth::user()->id);

        return redirect()->route('admin.blog.posts.index');
    }

    public function show(Post $post, User $user)
    {
        return view('admin.blog.posts.show', compact('post', 'user'));
    }

    public function edit(Post $post)
    {
        $categories = $this->service->getCategoryTree();
        $tags = $this->service->getTags();

        return view('admin.blog.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $this->service->update($request, $post);

        return redirect()->route('admin.blog.posts.show', $post);
    }

    public function photo(Post $post)
    {
        $this->service->removePhoto($post);

        return redirect()->route('admin.blog.posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $this->service->remove($post);

        return redirect()->route('admin.blog.posts.index');
    }

    public function verify(Post $post)
    {
        $this->service->verify($post);

        return redirect()->route('admin.blog.posts.show', $post);
    }

    public function draft(Post $post)
    {
        $this->service->draft($post);

        return redirect()->route('admin.blog.posts.show', $post);
    }

    private function search(Request $request, Builder $query): Builder
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('slug'))) {
            $query->where('slug', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        return $query;
    }
}