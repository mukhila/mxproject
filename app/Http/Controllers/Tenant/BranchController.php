<?php

namespace App\Http\Controllers\Tenant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tenant;
use App\Models\Branch;
use Auth;
use Hash;
use Session;


class BranchController extends Controller
{
    public function list()
    {
        $tenant_id =  Session::get('tenant_id');
        $branch = Branch::where('delete_status',0)->where('tenant_id',$tenant_id)->paginate(10);
        return view('branch.index')->with([
            'branch' => $branch
        ]);
    }
    public function add()
    {
        $tenant = Tenant::where('delete_status',0)->where('userid',Auth::user()->id)->get();
        return view('branch.create')->with([
            'tenant' => $tenant
        ]);
    }
    public function save(Request $request)
    {
       $request->validate([                        
            'address' => 'required', 
            'branchname' => 'required',    
            'contactno' => 'required',
            'emailid' => 'required|email',
            'mobileno' => 'required',                           
        ]);
        $tenant = Tenant::where('userid',Auth::user()->id)->first();
        $tenant_id = $tenant->id;
        $branch = new Branch;
        $branch->tenant_id = $tenant_id; 
        $branch->address = $request->address;
        $branch->branchname = $request->branchname;
        $branch->contactno = $request->contactno;
        $branch->emailid = $request->emailid;
        $branch->mobileno = $request->mobileno;
        $branch->status = 'Active';
        $branch->save();
           
       
        return redirect('/tenant/branch')->with('success', 'Branch successfully created');   
    }

    public function edit($id)
    {
        $branch = Branch::where('id',$id)->first();
        $tenant = Tenant::where('delete_status',0)->get();
        return view('branch.edit')->with([
            'branch' => $branch,
            'tenant' => $tenant 
        ]);
    }

    public function update(Request $request)
    {
         $id = $request->id;
         $request->validate([
            'id' => 'required',         
            'address' => 'required', 
            'branchname' => 'required',    
            'contactno' => 'required',
            'emailid' => 'required',
            'mobileno' => 'required',                        
        ]);
        
        //$tenant = Tenant::where('userid',Auth::user()->id)->first();
        //$tenant_id = $tenant->id;
        $branch = Branch::find($id);
        //$branch->tenant_id = $tenant_id; 
        $branch->address = $request->address;
        $branch->branchname = $request->branchname;
        $branch->contactno = $request->contactno;
        $branch->emailid = $request->emailid;
        $branch->mobileno = $request->mobileno;     
        $branch->status = 'Active';
        $branch->save();       
       
        return redirect('/tenant/branch')->with('success', 'Branch successfully Updated');

    }

    public function updatestatus($id) {
        $branch = Branch::where('id', '=', $id)->select('status')->first();
        $status = $branch->status;
        $branchstatus = 'Active';
        if($status == 'Active') {
            $branchstatus = 'Inactive';
        }
        Branch::where('id', '=', $id)->update(['status' => $branchstatus]);
      
        return redirect('/tenant/branch')->with('success', 'Branch status successfully updated');
    }
    public function destroy($id)
    {
        Branch::where('id', '=', $id)->update(['delete_status' => 1]);
       
        return redirect('/tenant/branch')->with('success', 'Branch details successfully deleted');
    }

}
