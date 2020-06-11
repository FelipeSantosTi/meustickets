<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSubscription;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private $repository;

    public function __construct(Subscription $subscription)
    {
        $this->repository = $subscription;
    }

    public function index()
    {
        $subscriptions = $this->repository->all();
        return view('admin.pages.subscriptions.index', [
            'subscriptions' => $subscriptions
        ]);
    }

    public function create()
    {
        return view('admin.pages.subscriptions.create');
    }

    public function store(StoreUpdateSubscription $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('admin.subscriptions.index');
    }

    public function show($id)
    {
        if (!$subscription = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.subscriptions.show', [
            'subscription' => $subscription
        ]);
    }

    public function edit($id)
    {
        if (!$subscription = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.subscriptions.edit', [
            'subscription' => $subscription
        ]);
    }

    public function update(StoreUpdateSubscription $request, $id)
    {
        if (!$subscription = $this->repository->find($id)) {
            return redirect()->back();
        }

        $subscription->update($request->all());

        return redirect()->route('admin.subscriptions.index');
    }

    public function destroy($id)
    {
        if (!$subscription = $this->repository->find($id)) {
            return redirect()->back();
        }

        $subscription->delete();

        return redirect()->route('admin.subscriptions.index');
    }
}
