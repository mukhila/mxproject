<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Branch;
use App\Models\TenantUsers;
use Auth;
use Hash;


class TenantUsersContoller extends Controller
{
    public function list()
    {
        $user = User::where('role', '=', 'Tenant')->orderBy('id', 'desc')->get();
        $tenantusers = TenantUsers::where('delete_status',0)->paginate(10);
        return view('tenantuser.index')->with([
            'tenantusers' => $tenantusers,
            'user' => $user,
        ]);
    }
    public function add()
    {
        $tenant = Tenant::where('delete_status',0)->where('userid',Auth::user()->id)->get();
        $branch = Branch::where('delete_status',0)->get();
        return view('tenantuser.create')->with([
            'tenant' => $tenant,
            'branch' => $branch
        ]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'branch_id' => 'required',               
            'role' => 'required',  
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
        $tenant = Tenant::where('userid',Auth::user()->id)->first();
        $tenantuser = new TenantUsers;
        $tenantuser->tenant_id = $tenant->id; 
        $tenantuser->branch_id = $request->branch_id;
        $tenantuser->role = $request->role;
        $tenantuser->user_id = $userid;
        $tenantuser->status = 'Active';
        $tenantuser->save();   
        Toastr::success('New User successfully created'); 
        return redirect('/tenant/tenantuser')->with('success', 'New User successfully created');  
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();       
        $tenantuser = TenantUsers::where('user_id',$id)->first();       
        $branch = Branch::where('delete_status',0)->get();
        return view('tenantuser.edit')->with([
            'branch' => $branch,           
            'tenantuser'=> $tenantuser,
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
         $id = $request->id;
         $request->validate([
            'id' => 'required',
            'name' => 'required',
            'mobile' => 'required|integer',
            'email' => 'email|required|unique:users,email,'.$request->id,                
            'role' => 'required',                        
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
        
        $user = TenantUsers::where('user_id', $request->id)->update([
            'branch_id' => $request->branch_id,
            "role" => $request->role,

        ]);   

        Toastr::success('User successfully Updated');       
        return redirect('/tenant/tenantuser')->with('success', 'User details successfully Updated');

    }

    public function updatestatus($id) {
        $tenantuser = User::where('id', '=', $id)->select('status')->first();
        $status = $tenantuser->status;
        $tenantuserstatus = 'Active';
        if($status == 'Active') {
            $tenantuserstatus = 'Inactive';
        }
        User::where('id', '=', $id)->update(['status' => $tenantuserstatus]);
        Toastr::success('User status successfully Updated');
        return redirect('/tenant/tenantuser')->with('success', 'User status successfully updated');
    }
    public function destroy($id)
    {
        User::where('id', '=', $id)->update(['delete_status' => 1]);
        Toastr::success('User successfully deleted');
        return redirect('/tenant/tenantuser')->with('success', 'User details successfully deleted');
    }
}
