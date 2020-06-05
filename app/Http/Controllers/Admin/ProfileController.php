<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    private $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }

    public function index()
    {
        $profiles = $this->repository->all();
        return view('admin.pages.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    public function store(StoreUpdateProfile $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('admin.profiles.index');
    }

    public function show($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.show', [
            'profile' => $profile
        ]);
    }

    public function edit($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.edit', [
            'profile' => $profile
        ]);
    }

    public function update(StoreUpdateProfile $request, $id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->update($request->all());

        return redirect()->route('admin.profiles.index');
    }

    public function destroy($id)
    {
        if (!$profile = $this->repository->find($id)) {
            return redirect()->back();
        }

        $profile->delete();

        return redirect()->route('admin.profiles.index');
    }
}
