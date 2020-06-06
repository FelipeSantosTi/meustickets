<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    // ACCESS x PROFILE ROUTES //
    Route::get('accesses/{id}/profiles/{idProfile}/detach', 'AccessProfileController@detach')
            ->name('accesses.profiles.detach');
    Route::post('accesses/{id}/profiles/attach', 'AccessProfileController@attach')
            ->name('accesses.profiles.attach');
    Route::get('accesses/{id}/profiles/availables', 'AccessProfileController@availables')
            ->name('accesses.profiles.availables');
    Route::get('accesses/{id}/profiles', 'AccessProfileController@profiles')
            ->name('accesses.profiles');
    Route::get('profiles/{id}/accesses', 'AccessProfileController@accesses')
            ->name('profiles.accesses');

    // PERMISSION x PROFILE ROUTES //
    Route::get('profiles/{id}/permissions/{idPermission}/detach', 'PermissionProfileController@detach')
            ->name('profiles.permissions.detach');
    Route::post('profiles/{id}/permissions/attach', 'PermissionProfileController@attach')
            ->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permissions/availables', 'PermissionProfileController@availables')
            ->name('profiles.permissions.availables');
    Route::get('profiles/{id}/permissions', 'PermissionProfileController@permissions')
            ->name('profiles.permissions');
    Route::get('permissions/{id}/profiles', 'PermissionProfileController@profiles')
            ->name('permissions.profiles');

    // PERMISSION ROUTES //
    Route::resource('permissions', 'PermissionController');

    // PROFILE ROUTES //
    Route::resource('profiles', 'ProfileController');

    // ACCESS ROUTES //
    Route::resource('accesses', 'AccessController');

    // HOME ROUTE //
    Route::get('/', 'HomeController@home')->name('home');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
