<?php

namespace App\Http\Controllers\Site;

use App\Access;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('site.pages.home.index');
    }

    public function access()
    {
        return redirect()->route('register');
    }
}
