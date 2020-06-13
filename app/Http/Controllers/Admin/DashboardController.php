<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(User $user, Subscription $subscription) {
        $this->user = $user;
        $this->subscription = $subscription;
    }

    public function home()
    {
        return view('admin.welcome');
    }

    public function dashboard()
    {
        $this->middleware(['can:Dashboard']);
        return view('admin.pages.dashboard.index');
    }
}
