<?php

namespace App\Http\Controllers\Admin;

use App\Access;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccessController extends Controller
{

    private $repository;

    public function __construct(Access $access)
    {
        $this->repository = $access;

        $this->middleware(['can:Acessos']);
    }

    public function index()
    {
        $accesses = $this->repository->all();
        return view('admin.pages.accesses.index', [
            'accesses' => $accesses
        ]);
    }

    public function create()
    {
        return view('admin.pages.accesses.create');
    }

    public function store(StoreUpdateAccess $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('admin.accesses.index');
    }

    public function show($url)
    {
        $access = $this->repository->where('url', $url)->first();

        if (!$access) {
            return redirect()->back();
        }
        return view('admin.pages.accesses.show', [
            'access' => $access
        ]);
    }

    public function edit($url)
    {
        $access = $this->repository->where('url', $url)->first();

        if (!$access) {
            return redirect()->back();
        }
        return view('admin.pages.accesses.edit', [
            'access' => $access
        ]);
    }

    public function update(StoreUpdateAccess $request, $url)
    {
        $access = $this->repository->where('url', $url)->first();

        if (!$access) {
            return redirect()->back();
        }

        $data = $request->all();
        $data['url'] = Str::kebab($request->name);

        $access->update($data);

        return redirect()->route('admin.accesses.index');
    }

    public function destroy($url)
    {
        $access = $this->repository->where('url', $url)->first();

        if (!$access) {
            return redirect()->back();
        }

        $access->delete();

        return redirect()->route('admin.accesses.index');
    }
}
