<?php

namespace App\Http\Controllers\Admin;

use App\Access;
use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;

class AccessProfileController extends Controller
{
    protected $access, $profile;

    public function __construct(Access $access, Profile $profile) {
        $this->access = $access;
        $this->profile = $profile;

        $this->middleware(['can:Acessos']);
    }

    public function profiles($idAccess)
    {
        if (!$access  = $this->access->with('Profiles')->find($idAccess)) {
            return redirect()->back();
        }

        $profiles = $access->profiles;

        return view('admin.pages.accesses.profiles.profiles', [
            'access' => $access,
            'profiles' => $profiles
        ]);

    }

    public function accesses($idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        $accesses = $profile->accesses()->paginate();

        return view('admin.pages.profiles.accesses.accesses', [
            'profile' => $profile,
            'accesses' => $accesses
        ]);
    }

    public function availables($idAccess)
    {
        if (!$access = $this->access->find($idAccess)) {
            return redirect()->back();
        }

        $profiles = $access->profilesAvailable();

        return view('admin.pages.accesses.profiles.availables', [
            'access' => $access,
            'profiles' => $profiles
            ]);
    }

    public function attach(Request $request, $idAccess)
    {
        if (!$access = $this->access->find($idAccess)) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
                ->back()
                ->with('info', 'Selecione ao menos um perfil!');
        }

        $access->profiles()->attach($request->profiles);

        return redirect()->route('admin.accesses.profiles', $access->id);
    }

    public function detach($idAccess, $idProfile)
    {
        $access = $this->access->find($idAccess);
        $profile = $this->profile->find($idProfile);

        if (!$access || !$profile) {
            return redirect()->back();
        }

        $access->profiles()->detach($profile);

        return redirect()->route('admin.accesses.profiles', $access->id);
    }
}
