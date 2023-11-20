<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Denomination;
use App\Models\Currency;
use Brian2694\Toastr\Facades\Toastr;

class DenominationController extends Controller
{
    public function list()
    {
        $denomination = Denomination::where('delete_status',0)->paginate(10);
   
         return view('denomination.index')->with([
            'denomination' => $denomination,          
        ]);
    }
    public function add()
    {
        $currency = Currency::where('delete_status',0)->get();
         return view('denomination.create')->with([
            'currency' => $currency,          
        ]);
    }

    public function save(Request $request)
    {

        $request->validate([
            'denomination_code' => 'required|unique:denomination|max:255',
            'currency_id' => 'required',
            'value' => 'required|not_in:0',
            'description' => 'required',
            'currency_type' => 'required',
        ]);

        $denomination = new Denomination;
        $denomination->denomination_code = $request->denomination_code;
        $denomination->currency_id = $request->currency_id;
        $denomination->value = $request->value;
        $denomination->description = $request->description;
        $denomination->currency_type = $request->currency_type;
        $denomination->save();   
        return redirect('/denomination/list')->with('success', 'Denomination successfully created');  
    }
    public function edit($id)
    {
         $denomination = Denomination::where('id',$id)->first();
         $currency = Currency::where('delete_status',0)->get();
          return view('denomination.edit')->with([
            'currency' => $currency,
            'denomination' => $denomination,  
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'denomination_code' => 'required',
            'currency_id' => 'required',
            'value' => 'required',
            'description' => 'required',
            'currency_type' => 'required',
        ]);

        $id = $request->id;        
        $denomination = Denomination::find($id);
        $denomination->denomination_code = $request->denomination_code;
        $denomination->currency_id = $request->currency_id;
        $denomination->value = $request->value;
        $denomination->description = $request->description;
        $denomination->currency_type = $request->currency_type;
        $denomination->save();   
        return redirect('/denomination/list')->with('success', 'Denomination successfully created');  
    }

    public function updatestatus($id) {
        $denomination = Denomination::where('id', '=', $id)->select('status')->first();
        $status = $denomination->status;
        $denominationstatus = 'Active';
        if($status == 'Active') {
            $denominationstatus = 'Inactive';
        }
        Denomination::where('id', '=', $id)->update(['status' => $denominationstatus]);
        return redirect('/denomination/list')->with('success', 'Denomination status successfully updated');
    }
    public function destroy($id)
    {
        Denomination::where('id', '=', $id)->update(['delete_status' => 1]);
        return redirect('/denomination/list')->with('success', 'Denomination details successfully deleted');
    }
}
