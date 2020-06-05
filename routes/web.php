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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

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
