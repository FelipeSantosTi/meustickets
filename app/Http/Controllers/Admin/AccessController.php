<?php

namespace App\Http\Controllers\Admin;

use App\Access;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessController extends Controller
{

    private $repository;

    public function __construct(Access $access)
    {
        $this->repository = $access;
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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
