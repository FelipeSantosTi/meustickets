<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;

        //$this->middleware(['can:Usuários']);
    }

    public function index()
    {
        $users = $this->repository->latest()->eventUser()->paginate();
        return view('admin.pages.users.index', [
            'users' => $users
        ]);
    }

    public function user()
    {
        return view('admin.pages.users.user');
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(StoreUpdateUser $request)
    {
        $data = request()->all();
        $data['event_id'] = auth()->user()->event_id;
        $data['password'] = bcrypt($data['password']);

        $this->repository->create($data);

        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        if (!$user = $this->repository->eventUser()->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.show', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        if (!$user = $this->repository->eventUser()->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.users.edit', [
            'user' => $user
        ]);
    }

    public function update(StoreUpdateUser $request, $id)
    {
        if (!$user = $this->repository->eventUser()->find($id)) {
            return redirect()->back();
        }

        $data =$request->only(['name', 'email', 'access_id']);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        if (!$user = $this->repository->eventUser()->find($id)) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
