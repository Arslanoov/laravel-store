<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\User\ComparisonItem;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\UseCases\Cabinet\ComparisonService;
use Illuminate\Support\Facades\Auth;

class ComparisonController extends Controller
{
    private $service;

    public function __construct(ComparisonService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        /** @var User $user */
        $user = Auth::guard()->user();

        $characteristics = $this->service->getUniqueCharacteristics($user->comparisonItems);

        return view('cabinet.comparison.index', compact('user', 'characteristics'));
    }

    public function add()
    {
        if (request()->ajax()) {
            /** @var User $user */
            $user = Auth::guard()->user();

            $productId = request()->post('productId');
            $this->service->create($user, $productId);
        }
    }

    public function remove(ComparisonItem $comparisonItem)
    {
        $this->service->remove($comparisonItem);
    }
}