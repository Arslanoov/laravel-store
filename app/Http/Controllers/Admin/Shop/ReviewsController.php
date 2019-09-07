<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\Review;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Review\UpdateRequest;
use App\UseCases\Admin\Shop\ReviewManageService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    private $service;

    public function __construct(ReviewManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getReviews();
        $query = $this->search($request, $query);

        $reviews = $query->paginate(20);

        return view('admin.shop.reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('admin.shop.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('admin.shop.reviews.edit', compact('review'));
    }

    public function update(UpdateRequest $request, Review $review)
    {
        $this->service->update($request, $review);

        return redirect()->route('admin.shop.reviews.show', $review);
    }

    public function destroy(Review $review)
    {
        $this->service->remove($review);

        return redirect()->route('admin.shop.reviews.index');
    }

    private function search(Request $request, Builder $query): Builder
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('text'))) {
            $query->where('text', 'like', '%' . $value . '%');
        }

        return $query;
    }
}