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

    public function consult()
    {
        $subscriptions = $this->repository->all();
        $id = auth()->user()->id;
        //dd($subscription);

        if (!$subscription = $subscriptions->where('user_id', $id)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.subscriptions.consult', [
            'subscription' => $subscription
        ]);
    }

    public function create()
    {
        $subscriptions = $this->repository->all();
        $id = auth()->user()->id;
        $subscription = $subscriptions->where('user_id', $id)->first();

        if (!$subscription = $subscriptions->where('user_id', $id)->first()) {
            return view('admin.pages.subscriptions.create', [
                'subscription' => $subscription
            ]);
        }

        if ($subscription->n1 != '' && $subscription->evaluator == auth()->user()->name) {
            return view('admin.pages.subscriptions.created', [
                'subscription' => $subscription
            ]);
        }

        if ($subscription->n1 != '' && $subscription->status == 'Revisão') {
            return view('admin.pages.subscriptions.create2', [
                'subscription' => $subscription
            ]);
        }

        if ($subscription->n2 != '') {
            return view('admin.pages.subscriptions.create3', [
                'subscription' => $subscription
            ]);
        }

        return view('admin.pages.subscriptions.created', [
            'subscription' => $subscription
        ]);
    }

    public function store(StoreUpdateSubscription $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'Submetido';

        $this->repository->create($data);

        return redirect()->route('admin.home');
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

        if (auth()->user()->access_id != '3') {
            if ($subscription->n1 != '') {
                $data['n2'] = $data['n1'];
                $data['n1'] = $subscription->n1;
            }
        }

        if (auth()->user()->access_id == '3') {
            $data['status'] = 'Submetido Revisado';
        }

        $subscription->update($data);

        return redirect()->route('admin.home');
    }

    public function destroy($id)
    {
        if (!$subscription = $this->repository->find($id)) {
            dd($subscription);
            return redirect()->back();
        }

        $subscription->delete();

        return redirect()->route('admin.home');
    }
}
