<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\SendRequest;
use App\UseCases\ContactService;

class ContactController extends Controller
{
    private $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('contact.index');
    }

    public function send(SendRequest $request)
    {
        $this->service->send($request);

        return redirect()->route('contact')->with('success', 'Message was sent successfully');
    }
}