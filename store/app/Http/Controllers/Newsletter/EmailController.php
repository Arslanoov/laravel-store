<?php

namespace App\Http\Controllers\Newsletter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Newsletter\AddEmailRequest;
use App\UseCases\Newsletter\EmailService;

class EmailController extends Controller
{
    private $service;

    public function __construct(EmailService $service)
    {
        $this->service = $service;
    }

    public function add(AddEmailRequest $request)
    {
        $this->service->add($request);

        return redirect()->route('home');
    }
}