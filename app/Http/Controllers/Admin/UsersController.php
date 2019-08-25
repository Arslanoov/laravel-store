<?php

namespace App\Http\Controllers\Admin;

use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\UseCases\Admin\User\UserManageService;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $service;

    public function __construct(UserManageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = $this->service->getUsers();
        $query = $this->search($request, $query);

        $users = $query->paginate(20);

        $statuses = $this->service->getStatuses();

        return view('admin.users.index', compact('users', 'statuses'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $statuses = $this->service->getStatuses();

        return view('admin.users.edit', compact('user', 'statuses'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $this->service->update($request, $user);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $this->service->remove($user);

        return redirect()->route('admin.users.index');
    }

    public function verify(User $user)
    {
        $this->service->verify($user);

        return redirect()->route('admin.users.index');
    }

    public function draft(User $user)
    {
        $this->service->draft($user);

        return redirect()->route('admin.users.index');
    }

    private function search(Request $request, Builder $query): Builder
    {
        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('email'))) {
            $query->where('email', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        if (!empty($value = $request->get('role'))) {
            $query->where('role', $value);
        }

        return $query;
    }
}