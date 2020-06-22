<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\Photo\CreateRequest;
use App\UseCases\Cabinet\PhotoService;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    private $service;

    public function __construct(PhotoService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        $user = Auth::user();

        return view('cabinet.photo.show', compact('user'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request, Auth::user());

        return redirect()->route('cabinet.photo.show');
    }
}