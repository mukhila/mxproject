<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Currency;
use Brian2694\Toastr\Facades\Toastr;
use App\Segment;

class CountryController extends Controller
{
     public function index()
    {
        $pagetitle = "Country";
        $country = Country::where('delete_status',0)->paginate(10);
        return view('country/index', compact('country','pagetitle'));
    }
    public function create()
    {        
        $pagetitle = "Add Country";
        $currency = Currency::where('delete_status',0)->get();
        return view('country/create', compact('pagetitle','currency'));
    }
    public function edit($id)
    {
        $pagetitle = "Update Country";
        $country = Country::where('id',$id)->first();
         $currency = Currency::where('delete_status',0)->get();
        return view('country/edit', compact('pagetitle','country','currency'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'country_name' => 'required|unique:country|max:255',
            'country_code' => 'required',
            'calling_code' => 'required',
            'currency_id' => 'required',
        ]);


        $country = new Country;
        $country->country_name  = $request->country_name ; 
        $country->country_code = $request->country_code; 
        $country->calling_code = $request->calling_code;
        $country->currency_id = $request->currency_id;


        $filename = '';
        if($request->hasFile('country_flag')){
            $folder = 'country';   
            $filename = $request->file('country_flag')->store('country_flag', 'public');;

        }

      
        $country->country_flag = $filename;

        $country->status = "Active";
        $country->save();       
        return redirect('/country')->with('success', 'Country successfully created');
    }

    public function update(Request $request)
    {

        
        $request->validate([
            'country_name' => 'required|unique:country|max:255',
            'country_code' => 'required',
            'calling_code' => 'required',
            'currency_id' => 'required',
        ]);

        
        $id = $request->id;
        $country = Country::find($id);

        $filename = $request->oldimage;
        if($request->hasFile('country_flag')){
            $folder = 'country';   
            $filename = $request->file('country_flag')->store('country_flag', 'public');;

        }
        $country->country_flag = $filename;
        $country->country_name  = $request->country_name; 
        $country->country_code = $request->country_code; 
        $country->calling_code = $request->calling_code;
        $country->currency_id = $request->currency_id;
        $country->status = "Active";
        $country->save();       
        return redirect('/country')->with('success', 'Country successfully Updated');
    }

    public function updatestatus($id) {
        $country = Country::where('id', '=', $id)->select('status')->first();
        $status = $country->status;
        $countrystatus = "Active";
        if($status == "Active") {
            $countrystatus = "Inactive";
        }
        Country::where('id', '=', $id)->update(['status' => $countrystatus]);
        return redirect('/country')->with('success', 'Country status successfully updated');
    }
    public function destroy($id)
    {
        Country::where('id', '=', $id)->update(['delete_status' => 1]);
        return redirect('/country')->with('success', 'Country details successfully deleted');
    }
}
