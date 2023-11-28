<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Denomination;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\tenant_denomination;
use Session;
use Auth;


class TenantDenominationController extends Controller
{
    public function list()
    {
        $tenant_id =  Session::get('tenant_id');
        $tenantdenomination = tenant_denomination::where('tenant_id',$tenant_id)->paginate(10);   
         return view('tenantdenomination.index')->with([
            'tenantdenomination' => $tenantdenomination,          
        ]);

    }
    public function add()
    {
        $denomination = Denomination::where('delete_status','0')->where('status','Active')->get();
        return view('tenantdenomination.create')->with([
            'denomination' => $denomination,          
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'denomination_id' => 'required',                                   
        ]);

         $tenant_id =  Session::get('tenant_id');
         $tenantdenomination = new tenant_denomination();
         $tenantdenomination->tenant_id = $tenant_id;
         $tenantdenomination->denomination_id = $request->denomination_id;
         $tenantdenomination->save();

        Toastr::success('New Denomination for this tenant successfully created'); 
        return redirect('/tenant/tenantdenomination')->with('success', 'New Denomination for this tenant successfully created');  
    }

    public function destroy($id)
    {        
        tenant_denomination::where('id', '=', $id)->delete();
        Toastr::success('Denomination successfully deleted');
        return redirect('/tenant/tenantdenomination')->with('success', 'Denomination successfully deleted');
    }
}
