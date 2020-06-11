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

        $this->middleware(['can:Inscrições']);
    }

    public function index()
    {
        $subscriptions = $this->repository->all();
        return view('admin.pages.subscriptions.index', [
            'subscriptions' => $subscriptions
        ]);
    }

    public function consult()
    {
        $id = auth()->user()->id;
        $subscriptions = $this->repository->all();
        $subscription = $subscriptions->where('user_id', $id)->first();;

        return view('admin.pages.subscriptions.consult', [
            'subscription' => $subscription
        ]);
    }

    public function create()
    {
        return view('admin.pages.subscriptions.create');
    }

    public function store(StoreUpdateSubscription $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $this->repository->create($data);

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

        $data = $request->all();
        $data['evaluator'] = auth()->user()->name;

        $subscription->update($data);

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
