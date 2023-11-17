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

Auth::routes();
// Overrides Auth Route
Route::post('/log-in', 'App\Http\Controllers\Auth\LoginController@loginNew')->name('login.custom');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/role', 'App\Http\Controllers\RoleController@redirectRoutes')->name('role');
Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@home');

Route::group([ 'prefix' => 'admin', 'middleware'=> ['auth' => 'Admin']], function () {

    // Dashboard
    Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@dashboard')->name('admin.dashboard');


    Route::get('/tenant/list', 'App\Http\Controllers\TenantController@list')->name('admin.tenant.list');
    Route::get('/tenant/add', 'App\Http\Controllers\TenantController@add')->name('admin.tenant.create');
    Route::post('/tenant/store', 'App\Http\Controllers\TenantController@store')->name('admin.tenant.store');
    Route::get('/tenant/{id}/edit', 'App\Http\Controllers\TenantController@edit')->name('admin.tenant.edit');
    Route::put('/tenant/update', 'App\Http\Controllers\TenantController@update')->name('admin.tenant.update');
    Route::get('/tenant/{id}/updatestatus', 'App\Http\Controllers\TenantController@updatestatus');        
    Route::get('/tenant/{id}/destroy', 'App\Http\Controllers\TenantController@destroy');

});

Route::group([ 'prefix' => 'tenant', 'middleware'=> ['auth' => 'Tenant']], function () {

    // Dashboard
    Route::get('/dashboard', 'App\Http\Controllers\TenantController@dashboard')->name('tenant.dashboard');
    Route::get('/profile', 'App\Http\Controllers\TenantController@profile')->name('tenant.profile');
    Route::get('/profile/{id}/edit', 'App\Http\Controllers\TenantController@profileedit')->name('tenant.profile.edit');
    Route::post('/profile/update', 'App\Http\Controllers\TenantController@profileupdate')->name('tenant.profile.update');

    Route::get('/list', 'App\Http\Controllers\TenantController@list')->name('tenant.list');
    Route::get('/add', 'App\Http\Controllers\TenantController@add')->name('tenant.create');
    Route::post('/store', 'App\Http\Controllers\TenantController@store')->name('tenant.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\TenantController@edit')->name('tenant.edit');
    Route::put('/update', 'App\Http\Controllers\TenantController@update')->name('tenant.update');
    Route::get('/{id}/updatestatus', 'App\Http\Controllers\TenantController@updatestatus');        
    Route::get('/{id}/destroy', 'App\Http\Controllers\TenantController@destroy');


    Route::get('/branch', 'App\Http\Controllers\BranchController@list')->name('tenant.branch');
    Route::get('/branch/add', 'App\Http\Controllers\BranchController@add')->name('branch.add');
    Route::post('/branch/save', 'App\Http\Controllers\BranchController@save')->name('branch.save');
    Route::get('/branch/{id}/edit', 'App\Http\Controllers\BranchController@edit')->name('branch.edit');
    Route::put('/branch/update', 'App\Http\Controllers\BranchController@update')->name('branch.update');
    Route::get('/branch/{id}/updatestatus', 'App\Http\Controllers\BranchController@updatestatus');        
    Route::get('/branch/{id}/destroy', 'App\Http\Controllers\BranchController@destroy');


    Route::get('/tenantuser', 'App\Http\Controllers\TenantUsersContoller@list')->name('tenant.tenantuser');
    Route::get('/tenantuser/add', 'App\Http\Controllers\TenantUsersContoller@add')->name('tenantuser.add');
    Route::post('/tenantuser/save', 'App\Http\Controllers\TenantUsersContoller@save')->name('tenantuser.save');
    Route::get('/tenantuser/{id}/edit', 'App\Http\Controllers\TenantUsersContoller@edit')->name('tenantuser.edit');
    Route::put('/tenantuser/update', 'App\Http\Controllers\TenantUsersContoller@update')->name('tenantuser.update');
    Route::get('/tenantuser/{id}/updatestatus', 'App\Http\Controllers\TenantUsersContoller@updatestatus');
    Route::get('/tenantuser/{id}/destroy', 'App\Http\Controllers\TenantUsersContoller@destroy');


});

Route::group([ 'prefix' => 'currency' ], function () {
        Route::get('/list', 'App\Http\Controllers\CurrencyController@list')->name('currency.list');
        Route::get('/add', 'App\Http\Controllers\CurrencyController@add')->name('currency.add');
        Route::post('/save', 'App\Http\Controllers\CurrencyController@save')->name('currency.save');
        Route::get('/{id}/edit', 'App\Http\Controllers\CurrencyController@edit')->name('currency.edit');
        Route::put('/update', 'App\Http\Controllers\CurrencyController@update')->name('currency.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\CurrencyController@updatestatus');        
        Route::get('/{id}/destroy', 'App\Http\Controllers\CurrencyController@destroy');
});



    Route::group([ 'prefix' => 'country' ], function () {
        Route::any('/', 'App\Http\Controllers\CountryController@index')->name('country');
        Route::any('/create', 'App\Http\Controllers\CountryController@create')->name('country.create');
        Route::any('/store', 'App\Http\Controllers\CountryController@store')->name('country.store');
        Route::any('/update', 'App\Http\Controllers\CountryController@update')->name('country.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\CountryController@updatestatus');
        Route::get('/{id}/edit', 'App\Http\Controllers\CountryController@edit')->name('country.edit');
        Route::get('/{id}/destroy', 'App\Http\Controllers\CountryController@destroy');
    });

Route::group([ 'prefix' => 'state' ], function () {
        Route::get('/list', 'App\Http\Controllers\StateController@list')->name('state.list');
        Route::get('/add', 'App\Http\Controllers\StateController@add')->name('state.add');
        Route::post('/save', 'App\Http\Controllers\StateController@save')->name('state.save');
        Route::get('/{id}/edit', 'App\Http\Controllers\StateController@edit')->name('state.edit');
        Route::put('/update', 'App\Http\Controllers\StateController@update')->name('state.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\StateController@updatestatus');        
        Route::get('/{id}/destroy', 'App\Http\Controllers\StateController@destroy');
});

Route::group([ 'prefix' => 'denomination' ], function () {
        Route::get('/list', 'App\Http\Controllers\DenominationController@list')->name('denomination.list');
        Route::get('/add', 'App\Http\Controllers\DenominationController@add')->name('denomination.add');
        Route::post('/save', 'App\Http\Controllers\DenominationController@save')->name('denomination.save');
        Route::get('/{id}/edit', 'App\Http\Controllers\DenominationController@edit')->name('denomination.edit');
        Route::put('/update', 'App\Http\Controllers\DenominationController@update')->name('denomination.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\DenominationController@updatestatus');        
        Route::get('/{id}/destroy', 'App\Http\Controllers\DenominationController@destroy');
});

 // Users
    Route::group([ 'prefix' => 'user' ], function () {
        Route::get('/list', 'App\Http\Controllers\UserController@list')->name('user.list');
        Route::get('/add', 'App\Http\Controllers\UserController@add')->name('user.add');
        Route::post('/save', 'App\Http\Controllers\UserController@save')->name('user.create');
        Route::get('/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
        Route::put('/update', 'App\Http\Controllers\UserController@update')->name('user.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\UserController@updatestatus');        
        Route::get('/{id}/destroy', 'App\Http\Controllers\UserController@destroy');
    });

