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


    Route::get('/tenant/list', 'App\Http\Controllers\Admin\TenantAdminController@list')->name('admin.tenant.list');
    Route::get('/tenant/add', 'App\Http\Controllers\Admin\TenantAdminController@add')->name('admin.tenant.create');
    Route::post('/tenant/store', 'App\Http\Controllers\Admin\TenantAdminController@store')->name('admin.tenant.store');
    Route::get('/tenant/{id}/edit', 'App\Http\Controllers\Admin\TenantAdminController@edit')->name('admin.tenant.edit');
    Route::put('/tenant/update', 'App\Http\Controllers\Admin\TenantAdminController@update')->name('admin.tenant.update');
    Route::get('/tenant/{id}/updatestatus', 'App\Http\Controllers\Admin\TenantAdminController@updatestatus');        
    Route::get('/tenant/{id}/destroy', 'App\Http\Controllers\Admin\TenantAdminController@destroy');


});

Route::group([ 'prefix' => 'tenant', 'middleware'=> ['auth' => 'Tenant']], function () {

    // Dashboard
    Route::get('/dashboard', 'App\Http\Controllers\Tenant\TenantController@dashboard')->name('tenant.dashboard');
    Route::get('/profile', 'App\Http\Controllers\Tenant\TenantController@profile')->name('tenant.profile');
    Route::get('/profile/{id}/edit', 'App\Http\Controllers\Tenant\TenantController@profileedit')->name('tenant.profile.edit');
    Route::post('/profile/update', 'App\Http\Controllers\Tenant\TenantController@profileupdate')->name('tenant.profile.update');



    Route::get('/branch', 'App\Http\Controllers\Tenant\BranchController@list')->name('tenant.branch');
    Route::get('/branch/add', 'App\Http\Controllers\Tenant\BranchController@add')->name('branch.add');
    Route::post('/branch/save', 'App\Http\Controllers\Tenant\BranchController@save')->name('branch.save');
    Route::get('/branch/{id}/edit', 'App\Http\Controllers\Tenant\BranchController@edit')->name('branch.edit');
    Route::put('/branch/update', 'App\Http\Controllers\Tenant\BranchController@update')->name('branch.update');
    Route::get('/branch/{id}/updatestatus', 'App\Http\Controllers\Tenant\BranchController@updatestatus');        
    Route::get('/branch/{id}/destroy', 'App\Http\Controllers\Tenant\BranchController@destroy');


    Route::get('/tenantuser', 'App\Http\Controllers\Tenant\TenantUsersContoller@list')->name('tenant.tenantuser');
    Route::get('/tenantuser/add', 'App\Http\Controllers\Tenant\TenantUsersContoller@add')->name('tenantuser.add');
    Route::post('/tenantuser/save', 'App\Http\Controllers\Tenant\TenantUsersContoller@save')->name('tenantuser.save');
    Route::get('/tenantuser/{id}/edit', 'App\Http\Controllers\Tenant\TenantUsersContoller@edit')->name('tenantuser.edit');
    Route::put('/tenantuser/update', 'App\Http\Controllers\Tenant\TenantUsersContoller@update')->name('tenantuser.update');
    Route::get('/tenantuser/{id}/updatestatus', 'App\Http\Controllers\Tenant\TenantUsersContoller@updatestatus');
    Route::get('/tenantuser/{id}/destroy', 'App\Http\Controllers\Tenant\TenantUsersContoller@destroy');


    Route::get('/tenantcurrency', 'App\Http\Controllers\Tenant\TenantCurrenciesController@list')->name('tenantcurrency.list');
    Route::get('/tenantcurrency/add', 'App\Http\Controllers\Tenant\TenantCurrenciesController@add')->name('tenantcurrency.add');
    Route::post('/tenantcurrency/store', 'App\Http\Controllers\Tenant\TenantCurrenciesController@store')->name('tenantcurrency.store');
    Route::get('/tenantcurrency/{id}/destroy', 'App\Http\Controllers\Tenant\TenantCurrenciesController@destroy');


     Route::get('/tenantdenomination', 'App\Http\Controllers\Tenant\TenantDenominationController@list')->name('tenantdenomination.list');
    Route::get('/tenantdenomination/add', 'App\Http\Controllers\Tenant\TenantDenominationController@add')->name('tenantdenomination.add');
     Route::post('/tenantdenomination/store', 'App\Http\Controllers\Tenant\TenantDenominationController@store')->name('tenantdenomination.store');
     Route::post('/gettingdenomination/ajaxRequest', 'App\Http\Controllers\Tenant\TenantDenominationController@ajaxRequest')->name('tenantdenomination.ajaxRequest');

     Route::post('/gettingdenomination/ajaxRequestForDenomination', 'App\Http\Controllers\Tenant\TenantDenominationController@ajaxRequestForDenomination')->name('tenantdenomination.ajaxRequestForDenomination');



    Route::get('/tenantdenomination/{id}/destroy', 'App\Http\Controllers\Tenant\TenantDenominationController@destroy');


});

Route::group([ 'prefix' => 'currency' ], function () {
        Route::get('/list', 'App\Http\Controllers\Admin\CurrencyController@list')->name('currency.list');
        Route::get('/add', 'App\Http\Controllers\Admin\CurrencyController@add')->name('currency.add');
        Route::post('/save', 'App\Http\Controllers\Admin\CurrencyController@save')->name('currency.save');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CurrencyController@edit')->name('currency.edit');
        Route::put('/update', 'App\Http\Controllers\Admin\CurrencyController@update')->name('currency.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\Admin\CurrencyController@updatestatus');        
        Route::get('/{id}/destroy', 'App\Http\Controllers\Admin\CurrencyController@destroy');
});



    Route::group([ 'prefix' => 'country' ], function () {
        Route::any('/', 'App\Http\Controllers\Admin\CountryController@index')->name('country');
        Route::any('/create', 'App\Http\Controllers\Admin\CountryController@create')->name('country.create');
        Route::any('/store', 'App\Http\Controllers\Admin\CountryController@store')->name('country.store');
        Route::any('/update', 'App\Http\Controllers\Admin\CountryController@update')->name('country.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\Admin\CountryController@updatestatus');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CountryController@edit')->name('country.edit');
        Route::get('/{id}/destroy', 'App\Http\Controllers\Admin\CountryController@destroy');
    });

Route::group([ 'prefix' => 'state' ], function () {
        Route::get('/list', 'App\Http\Controllers\Admin\StateController@list')->name('state.list');
        Route::get('/add', 'App\Http\Controllers\Admin\StateController@add')->name('state.add');
        Route::post('/save', 'App\Http\Controllers\Admin\StateController@save')->name('state.save');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\StateController@edit')->name('state.edit');
        Route::put('/update', 'App\Http\Controllers\Admin\StateController@update')->name('state.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\Admin\StateController@updatestatus');        
        Route::get('/{id}/destroy', 'App\Http\Controllers\Admin\StateController@destroy');
});

Route::group([ 'prefix' => 'denomination' ], function () {
        Route::get('/list', 'App\Http\Controllers\Admin\DenominationController@list')->name('denomination.list');
        Route::get('/add', 'App\Http\Controllers\Admin\DenominationController@add')->name('denomination.add');
        Route::post('/save', 'App\Http\Controllers\Admin\DenominationController@save')->name('denomination.save');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\DenominationController@edit')->name('denomination.edit');
        Route::put('/update', 'App\Http\Controllers\Admin\DenominationController@update')->name('denomination.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\Admin\DenominationController@updatestatus');        
        Route::get('/{id}/destroy', 'App\Http\Controllers\Admin\DenominationController@destroy');
});

 // Users
    Route::group([ 'prefix' => 'user' ], function () {
        Route::get('/list', 'App\Http\Controllers\Admin\UserController@list')->name('user.list');
        Route::get('/add', 'App\Http\Controllers\Admin\UserController@add')->name('user.add');
        Route::post('/save', 'App\Http\Controllers\Admin\UserController@save')->name('user.create');
        Route::get('/{id}/edit', 'App\Http\Controllers\Admin\UserController@edit')->name('user.edit');
        Route::put('/update', 'App\Http\Controllers\Admin\UserController@update')->name('user.update');
        Route::get('/{id}/updatestatus', 'App\Http\Controllers\Admin\UserController@updatestatus');        
        Route::get('/{id}/destroy', 'App\Http\Controllers\Admin\UserController@destroy');
    });


      Route::group([ 'prefix' => 'companyusers' ], function () {
        Route::get('/dashboard', 'App\Http\Controllers\CompanyUsers\CompanyUserController@dashboard')->name('companyusers.list');

    Route::get('/profile', 'App\Http\Controllers\CompanyUsers\CompanyUserController@profile')->name('companyusers.profile');
    Route::get('/profile/{id}/edit', 'App\Http\Controllers\CompanyUsers\CompanyUserController@profileedit')->name('companyusers.profile.edit');
    Route::post('/profile/update', 'App\Http\Controllers\CompanyUsers\CompanyUserController@profileupdate')->name('companyusers.profile.update');

    Route::get('/exchange', 'App\Http\Controllers\CompanyUsers\ExchangeRateController@index')->name('companyusers.exchange');
    Route::get('/exchange/create', 'App\Http\Controllers\CompanyUsers\ExchangeRateController@create')->name('companyusers.exchange.create');
    Route::post('/exchange/store', 'App\Http\Controllers\CompanyUsers\ExchangeRateController@store')->name('companyusers.exchange.store');
    Route::get('/exchange/{id}/edit', 'App\Http\Controllers\CompanyUsers\ExchangeRateController@edit')->name('companyusers.exchange.edit');

    Route::put('/exchange/update', 'App\Http\Controllers\CompanyUsers\ExchangeRateController@update')->name('companyusers.exchange.update');


     Route::post('/exchange/ajaxRequest', 'App\Http\Controllers\CompanyUsers\ExchangeRateController@ajaxRequest')->name('companyusers.exchange.ajaxRequest');
      
    });


