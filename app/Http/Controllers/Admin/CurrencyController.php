<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function list()
    {
        $currency = Currency::where('delete_status',0)->paginate(10);
   
         return view('currency.index')->with([
            'currency' => $currency,          
        ]);
    }
    public function add()
    {
         return view('currency.create');
    }
    public function save(Request $request)
    {
        $request->validate([
            'currency_name' => 'required|unique:currency|max:255',
            'currency_code' => 'required',
            'currency_symbol' => 'required',
        ]);


        $currency = new Currency;
        $currency->currency_name = $request->currency_name; 
        $currency->currency_code = $request->currency_code; 
        $currency->currency_symbol = $request->currency_symbol;
        $currency->status = 'Active';
        $currency->save();   
        return redirect('/currency/list')->with('success', 'Currency successfully created');    
    }
    public function edit($id)
    {
         $currency = Currency::where('id',$id)->first();
          return view('currency.edit')->with([
            'currency' => $currency,          
        ]);
    }

     public function update(Request $request)
    {

         $id = $request->id;
        $request->validate([
            'currency_name' => 'required|unique:currency,currency_name,'.$id.'|max:255',
            'currency_code' => 'required',
            'currency_symbol' => 'required',
        ]);

        
       
        $currency = Currency::find($id);
        $currency->currency_name = $request->currency_name; 
        $currency->currency_code = $request->currency_code; 
        $currency->currency_symbol = $request->currency_symbol;
        $currency->status = 'Active';
        $currency->save();       
        return redirect('/currency/list')->with('success', 'Currency successfully Updated');
    }

    public function updatestatus($id) {
        $currency = Currency::where('id', '=', $id)->select('status')->first();
        $status = $currency->status;
        $currencystatus = 'Active';
        if($status == 'Active') {
            $currencystatus = 'Inactive';
        }
        Currency::where('id', '=', $id)->update(['status' => $currencystatus]);
        return redirect('/currency/list')->with('success', 'Currency status successfully updated');
    }
    public function destroy($id)
    {
        Currency::where('id', '=', $id)->update(['delete_status' => 1]);
        return redirect('/currency/list')->with('success', 'Currency details successfully deleted');
    }

}
