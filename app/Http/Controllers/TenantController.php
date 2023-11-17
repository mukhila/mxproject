<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\Tenant;
use Auth;
use Hash;

class TenantController extends Controller
{
    public function dashboard()
    {
        $tenant = Tenant::where('userid',Auth::user()->id)->first();
        return view('tenant.dashboard')->with([
           'tenant' => $tenant
        ]);;
    }
    public function list()
    {
       /* $tenant = User::where('role', '=', 'Tenant')->orderBy('id', 'desc')->get();*/


        $tenant = User::where('role', '=', 'Tenant')->where('delete_status','0')->whereNotIn('id', function($query) {
                $query->select('user_id')->from('tenantusers')->where('delete_status','0');
            })->get();

        return view('usertenant.index')->with([
           'tenant' => $tenant
        ]);

    }
    public function add()
    {
        return view('usertenant.create');
    }
    public function store(Request $request)
    {
       $request->validate([            
            'company_name' => 'required', 
            'name' => 'required',
            'mobile' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required',                                         
        ]);
        

        $user = new User();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'Tenant';
        $user->gender = $request->gender;
        $timestamp = strtotime($request->dob);
        $user->dob = date('Y-m-d', $timestamp);
        $user->status = 'Active';
        $user->save();

        $userid = $user->id;

        $tenant = new Tenant;
        $tenant->userid = $userid;
        $tenant->company_name = $request->company_name; 
        $tenant->status = 'Active';
        $tenant->save();


        Toastr::success('Tenant successfully created');   
        return redirect('admin/tenant/list')->with('success', 'Tenant successfully created');   
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        $tenant = Tenant::where('userid',$id)->first();
        return view('usertenant.edit')->with([
            'tenant' => $tenant,
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
         $id = $request->id;
         $request->validate([
            'id' => 'required',
            'company_name' => 'required',             
            'name' => 'required',
            'mobile' => 'required|integer',
            'email' => 'email|required|unique:users,email,'.$request->id,                             
        ]);

        $timestamp = strtotime($request->dob);
        $dob = date('Y-m-d', $timestamp);
        // Update User
        $user = User::where('id', $request->id)->update([
            "name" => $request->name,
            "mobile" => $request->mobile,
            "gender" => $request->gender,
            "dob" => $dob,
            "email" => $request->email,
            "role" => 'Tenant',
            
        ]);
        
        // Update User Password
        if($request->password){
            User::where('id', $request->id)->update([            
                'password' => Hash::make($request->password)
            ]);
        }
         
        $tenant = Tenant::where('userid', $request->id)->update([
            "company_name" => $request->company_name,
        ]);       
        Toastr::success('Tenant successfully Updated');         
        return redirect('admin/tenant/list')->with('success', 'Tenant successfully Updated');

    }

    public function updatestatus($id) {
        $tenant = User::where('id', '=', $id)->select('status')->first();

        $status = $tenant->status;
        $tenantstatus = 'Active';
        if($status == 'Active') {
            $tenantstatus = 'Inactive';
        }
        User::where('id', '=', $id)->update(['status' => $tenantstatus]);
        Toastr::success('Tenant status successfully Updated');    
        return redirect('admin/tenant/list')->with('success', 'Tenant status successfully updated');
    }
    public function destroy($id)
    {
        User::where('id', '=', $id)->update(['delete_status' => 1]);
        Toastr::success('Tenant successfully deleted'); 
        return redirect('admin/tenant/list')->with('success', 'Tenant details successfully deleted');
    }

    public function profile()
    {
        $users = User::where('id', '=', Auth::user()->id)->first();
        $tenant = Tenant::where('userid',Auth::user()->id)->first();
        return view('tenant.profile')->with([
            'users' => $users,
            'tenant' =>$tenant
        ]);
    }
    public function profileedit($id)
    {
         $user = User::where('id', $id)->first();

        return view('tenant.edit')->with([
            'user' => $user
        ]);
    }
    public function profileupdate(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'mobile' => 'required|integer',
            'email' => 'email|required|unique:users,email,'.$request->id,                  
        ]);
        
        // Update User
        $user = User::where('id', $request->id)->update([
            "name" => $request->name,
            "mobile" => $request->mobile,
            "gender" => $request->gender,
            "dob" => $request->dob,
            "email" => $request->email,           
            
        ]);
        
        // Update User Password
        if($request->password){
            User::where('id', $request->id)->update([            
                'password' => Hash::make($request->password)
            ]);
        }

        Toastr::success('User Updated');
        return redirect(route('tenant.profile'));
    }
}
