<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Tenant;
use App\Models\Branch;
use Auth;
use Hash;


class BranchController extends Controller
{
    public function list()
    {
        $branch = Branch::where('delete_status',0)->paginate(10);
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
            'emailid' => 'required',
            'mobileno' => 'required',                           
        ]);
        $branch = new Branch;
        $branch->tenant_id = $request->tenant_id; 
        $branch->address = $request->address;
        $branch->branchname = $request->branchname;
        $branch->contactno = $request->contactno;
        $branch->emailid = $request->emailid;
        $branch->mobileno = $request->mobileno;
        $branch->status = 'Active';
        $branch->save();   
        Toastr::success('Branch successfully created');    
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
         
        $branch = Branch::find($id);
        $branch->tenant_id = $request->tenant_id; 
        $branch->address = $request->address;
        $branch->branchname = $request->branchname;
        $branch->contactno = $request->contactno;
        $branch->emailid = $request->emailid;
        $branch->mobileno = $request->mobileno;     
        $branch->status = 'Active';
        $branch->save();       
        Toastr::success('Branch successfully updated');
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
        Toastr::success('Branch status successfully updated');
        return redirect('/tenant/branch')->with('success', 'Branch status successfully updated');
    }
    public function destroy($id)
    {
        Branch::where('id', '=', $id)->update(['delete_status' => 1]);
        Toastr::success('Branch details successfully deleted');
        return redirect('/tenant/branch')->with('success', 'Branch details successfully deleted');
    }

}
