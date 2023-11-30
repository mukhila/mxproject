<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\tenant_currency;
use Session;
use Auth;

class TenantCurrenciesController extends Controller
{
    public function list()
    {
        $tenant_id =  Session::get('tenant_id');
        $tenantcurrency = tenant_currency::where('tenant_id',$tenant_id)->paginate(10);   
         return view('tenantcurrency.index')->with([
            'tenantcurrency' => $tenantcurrency,          
        ]);

    }
    public function add()
    {
        $currency = Currency::where('delete_status','0')->where('status','Active')->get();
        return view('tenantcurrency.create')->with([
            'currency' => $currency,          
        ]);
    }
    public function store(Request $request)
    {
        $tenant_id =  Session::get('tenant_id');
        $request->validate([
            'currency_id' => 'required|unique:tenant_currencies,tenant_id,'.$tenant_id,                                   
        ]);

         $tenant_id =  Session::get('tenant_id');
         $tenantcurrency = new tenant_currency();
         $tenantcurrency->tenant_id = $tenant_id;
         $tenantcurrency->currency_id = $request->currency_id;
         $tenantcurrency->save();

        
        return redirect('/tenant/tenantcurrency')->with('success', 'New Currency for this tenant successfully created');  
    }

    public function destroy($id)
    {        
        tenant_currency::where('id', '=', $id)->delete();
        
        return redirect('/tenant/tenantcurrency')->with('success', 'Currency successfully deleted');
    }


}
