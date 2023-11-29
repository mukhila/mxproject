<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\State;
use App\Models\Country;

class StateController extends Controller
{
   public function list()
    {
        $state = State::where('delete_status',0)->paginate(10);
   
         return view('state.index')->with([
            'state' => $state,          
        ]);
    }
    public function add()
    {
        $country = Country::where('delete_status',0)->get();
         return view('state.create')->with([
            'country' => $country,          
        ]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'state_name' => 'required|unique:state|max:255',
            'country_id' => 'required',           
        ]);


        $state = new State;
        $state->state_name  = $request->state_name; 
        $state->country_id = $request->country_id; 
      
        $state->status = 'Active';
        $state->save();   
        return redirect('/state/list')->with('success', 'State successfully created');    
    }
    public function edit($id)
    {
         $country = Country::where('delete_status',0)->get();
         $state = State::where('id',$id)->first();
          return view('state.edit')->with([
            'state' => $state,  
            'country' => $country,         
        ]);
    }

     public function update(Request $request)
    {

         $request->validate([
            'id' => 'required',
            'state_name' => 'required|unique:state|max:255',
            'country_id' => 'required',           
        ]);

        $id = $request->id;
        $state = State::find($id);
        $state->state_name = $request->state_name; 
        $state->country_id = $request->country_id; 
        
        $state->status = 'Active';
        $state->save();       
        return redirect('/state/list')->with('success', 'State successfully Updated');
    }

    public function updatestatus($id) {
        $state = State::where('id', '=', $id)->select('status')->first();
        $status = $state->status;
        $statestatus = 'Active';
        if($status == 'Active') {
            $statestatus = 'Inactive';
        }
        State::where('id', '=', $id)->update(['status' => $statestatus]);
        return redirect('/state/list')->with('success', 'State status successfully updated');
    }
    public function destroy($id)
    {
        State::where('id', '=', $id)->update(['delete_status' => 1]);
        return redirect('/state/list')->with('success', 'State details successfully deleted');
    }
}
