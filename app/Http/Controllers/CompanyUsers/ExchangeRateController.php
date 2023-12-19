<?php

namespace App\Http\Controllers\CompanyUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exchange_Rate;
use App\Models\tenant_denomination;
use App\Models\Denomination;
use App\Models\Currency;
use App\Models\Country;
use App\Models\TenantUsers;
use App\Http\Requests\StoreExchange_RateRequest;
use App\Http\Requests\UpdateExchange_RateRequest;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class ExchangeRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = now();

         $tenant_id = Session::get('tenant_id');
         $user_id = Session::get('user_id');
         $exchangerates = Exchange_Rate::where('tenant_id',$tenant_id)->where('date',$date->format('Y-m-d'))->paginate(10);
         return view('exchangerates.index')->with([
            'exchangerates' => $exchangerates,          
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenant_id = Session::get('tenant_id');
        $user_id = Session::get('user_id');
        $branch_id = TenantUsers::where('user_id',$user_id)->pluck('branch_id')->first();
        $tenant_denomination = tenant_denomination::where('tenant_id',$tenant_id)->get();
        $denomination = Denomination::where('delete_status','0')->where('status','Active')->get();
        $country = Country::where('delete_status','0')->where('status','Active')->get();
        return view('exchangerates.create')->with([
            'tenant_id' => $tenant_id,  
            'user_id' => $user_id,
            'tenant_denomination' => $tenant_denomination,
            'branch_id' => $branch_id,
            'denomination' => $denomination,
            'country' => $country
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExchange_RateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExchange_RateRequest $request)
    {
         $tenant_id =  Session::get('tenant_id');
    
         $date = now();

        $count = count($request->market_rate);
         for($i=0;$i<$count;$i++){

             $exchangerates = new Exchange_Rate();
             $exchangerates->tenant_id = $tenant_id;
             $exchangerates->branch_id = $request->branch_id;
             $exchangerates->tenant_denomination_id = $request->tenant_denomination_id[$i];
             $exchangerates->date = $date->format('Y-m-d');
             $exchangerates->market_rate = $request->market_rate[$i];
             $exchangerates->buy_rate = $request->buy_rate[$i];
             $exchangerates->sell_rate = $request->sell_rate[$i];
             $exchangerates->save();
             
         }

        
          return redirect('/companyusers/exchange')->with('success', 'New Exchange Rate successfully created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exchange_Rate  $exchange_Rate
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange_Rate $exchange_Rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exchange_Rate  $exchange_Rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange_Rate $exchange_Rate, Request $request)
    {

        $exchange_Rates = Exchange_Rate::where('id',$request->id)->first();
        $tenant_denominations = tenant_denomination::where('id',$exchange_Rates->tenant_denomination_id)->first();
        $denomination = Denomination::where('id',$tenant_denominations->denomination_id)->first();
        $denomination->currency_name = Currency::where('id',$denomination->currency_id)->pluck('currency_name')->first();
        return view('exchangerates.edit')->with([
            'exchange_Rate' => $exchange_Rates,
            'tenant_denominations' => $tenant_denominations,
            'denomination' => $denomination
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExchange_RateRequest  $request
     * @param  \App\Models\Exchange_Rate  $exchange_Rate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExchange_RateRequest $request, Exchange_Rate $exchange_Rate)
    {
         $id = $request->id;
         $exchangerates = Exchange_Rate::find($id);
         $exchangerates->market_rate = $request->market_rate;
         $exchangerates->buy_rate = $request->buy_rate;
         $exchangerates->sell_rate = $request->sell_rate;
         $exchangerates->save();
         return redirect('/companyusers/exchange')->with('success', 'Exchange Rate successfully updated'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exchange_Rate  $exchange_Rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange_Rate $exchange_Rate)
    {
        //
    }


    public function ajaxRequest(Request $request)
    {
       
        $denomination = DB::table('denomination')->join('tenant_denominations', 'tenant_denominations.denomination_id', '=', 'denomination.id')->select('denomination.id as denomination_id','denomination.currency_id','denomination.denomination_code','denomination.value','denomination.currency_type','tenant_denominations.id as tenant_denomination_id')->where('denomination.currency_id',$request->currency_id)->get();

        $denomination->currency_name = Currency::where('id',$request->currency_id)->pluck('currency_name');


       return response()->json(array('denomination'=> $denomination), 200);
    }
}
