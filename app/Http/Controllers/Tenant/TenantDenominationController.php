<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Country;
use App\Models\Denomination;

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
        $country = Country::where('delete_status','0')->where('status','Active')->get();
        return view('tenantdenomination.create')->with([
            'denomination' => $denomination,   
            'country' => $country        
        ]);
    }
    public function store(Request $request)
    {
        $tenant_id =  Session::get('tenant_id');
        $request->validate([
            'denomination_id' => 'required|unique:tenant_denominations,tenant_id,'.$tenant_id,                                   
        ]);

         
         $tenantdenomination = new tenant_denomination();
         $tenantdenomination->tenant_id = $tenant_id;
         $tenantdenomination->denomination_id = $request->denomination_id;
         $tenantdenomination->currency_id = $request->currency_id;
         $tenantdenomination->save();

              
        return redirect('/tenant/tenantdenomination')->with('success', 'New Denomination for this tenant successfully created');  
    }

    public function destroy($id)
    {        
        tenant_denomination::where('id', '=', $id)->delete();
       
        return redirect('/tenant/tenantdenomination')->with('success', 'Denomination successfully deleted');
    }
    public function ajaxRequest(Request $request)
    {
       $denomination = Denomination::where('id',$request->denomination_id)->first();
       $denomination->currency_name = Currency::where('id',$denomination->currency_id)->pluck('currency_name');

       return response()->json(array('denomination'=> $denomination), 200);
    }

    public function ajaxRequestForDenomination(Request $request)
    {
        $denomination = Denomination::where('currency_id',$request->currency_id)->get();
        return response()->json(array('denomination'=> $denomination), 200);
    }
}
