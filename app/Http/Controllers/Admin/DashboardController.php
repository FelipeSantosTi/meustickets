<?php

namespace App\Http\Controllers\Admin;

use App\Charts\ReportChart;
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

    public function dashboard(ReportChart $chart)
    {
        $totalUsers = $this->user->all()->count();
        $totalAcd = $this->user->where('access_id', '3')->count();
        $totalAv = $this->user->where('access_id', '2')->count();
        $totalAdm = $this->user->where('access_id', '1')->count();

        /* $chart->labels();
        $chart->dataset('2020', 'bar', [
            12, 14, 25
        ]); */

        $this->middleware(['can:Dashboard']);
        return view('admin.pages.dashboard.index', [
            'totalUsers' => $totalUsers,
            'totalAcd' => $totalAcd,
            'totalAv' => $totalAv,
            'totalAdm' => $totalAdm,
            'chart' => $chart
        ]);
    }
}
