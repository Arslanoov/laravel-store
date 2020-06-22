<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Blog\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\Comment\UpdateRequest;
use App\UseCases\Admin\Shop\CommentManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private $service;

    public function __construct(CommentManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getComments();
        $query = $this->search($request, $query);

        $comments = $query->paginate(20);

        return view('admin.shop.comments.index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        return view('admin.shop.comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        return view('admin.shop.comments.edit', compact('comment'));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $this->service->update($request, $comment);

        return redirect()->route('admin.shop.comments.show', $comment);
    }

    public function activate(Comment $comment)
    {
        $this->service->activate($comment);

        return redirect()->route('admin.shop.comments.show', $comment);
    }

    public function destroy(Comment $comment)
    {
        $this->service->remove($comment);

        return redirect()->route('admin.shop.comments.index');
    }

    private function search(Request $request, Builder $query): Builder
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('parentId'))) {
            $query->where('parent_id', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('text'))) {
            $query->where('text', 'like', '%' . $value . '%');
        }

        return $query;
    }
}