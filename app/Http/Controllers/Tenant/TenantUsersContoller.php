<?php

namespace App\Http\Controllers\Tenant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Branch;
use App\Models\TenantUsers;
use Auth;
use Hash;
use Session;


class TenantUsersContoller extends Controller
{
    public function list()
    {
        $tenant_id =  Session::get('tenant_id');
        //$user = User::where('role', 'Tenant')->where('delete_status','0')->orderBy('id', 'desc')->get();
       
        $tenantusers = TenantUsers::where('tenant_id',$tenant_id)->where('delete_status', '0')->get();
        return view('tenantuser.index')->with([
            'tenantusers' => $tenantusers,
            //'user' => $user,
        ]);
    }
    public function add()
    {
        $tenant_id =  Session::get('tenant_id');
        $tenant = Tenant::where('delete_status',0)->where('userid',Auth::user()->id)->get();
        $branch = Branch::where('delete_status',0)->where('tenant_id',$tenant_id)->get();
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
   
        return redirect('/tenant/tenantuser')->with('success', 'User status successfully updated');
    }
    public function destroy($id)
    {
        User::where('id', '=', $id)->update(['delete_status' => 1]);
        TenantUsers::where('user_id', '=', $id)->update(['delete_status' => 1]);
     
        return redirect('/tenant/tenantuser')->with('success', 'User details successfully deleted');
    }
}
