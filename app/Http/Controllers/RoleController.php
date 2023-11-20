<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Branch;
use App\Models\TenantUsers;
use Session;

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
            $tenant = Tenant::where('userid',Auth::user()->id)->first();
            if(isset($tenant))
            {
                Session::put('tenant_id', $tenant->id);
                return redirect('tenant/dashboard');
            }
            else
            {
               $tenant = TenantUsers::where('user_id',Auth::user()->id)->first();
               Session::put('tenant_id', $tenant->tenant_id);
               return redirect('companyusers/dashboard');
            }
            
        }
        return redirect(route('login'));
    }
}
