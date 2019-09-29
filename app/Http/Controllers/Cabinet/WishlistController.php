<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\User\User;
use App\Entity\User\WishlistItem;
use App\Http\Controllers\Controller;
use App\UseCases\Cabinet\WishlistService;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    private $service;

    public function __construct(WishlistService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        /** @var User $user */
        $user = Auth::guard()->user();
        $query = $this->service->getAllWishlistItems($user);

        $items = $query->paginate(10);

        return view('cabinet.wishlist.index', $items);
    }

    public function create()
    {
        if (request()->ajax()) {
            /** @var User $user */
            $user = Auth::guard()->user();
            $productId = request()->post('postId');

            $this->service->create($user, $productId);
        }
    }

    public function remove(WishlistItem $item)
    {
        $this->service->remove($item);

        return redirect()
            ->route('cabinet.wishlist.index')
            ->with('success', 'Item successfully deleted');
    }
}