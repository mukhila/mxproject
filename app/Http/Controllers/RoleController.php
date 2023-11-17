<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RoleController extends Controller
{
    public function redirectRoutes()
    {
        if (Auth::user() && Auth::user()->role != 'Tenant')
        {
            return redirect('admin/dashboard');
        }
        elseif(Auth::user() && Auth::user()->role == 'Tenant')
        {
            return redirect('tenant/dashboard');
        }
        return redirect(route('login'));
    }
}
