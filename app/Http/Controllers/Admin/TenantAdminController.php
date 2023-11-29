<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tenant;
use Session;
use Auth;
use Hash;

class TenantAdminController extends Controller
{
    public function list()
    {
       /* $tenant = User::where('role', '=', 'Tenant')->orderBy('id', 'desc')->get();*/


        $tenant = User::where('role', '=', 'Tenant')->where('delete_status','0')->whereIn('id', function($query) {
                $query->select('userid')->from('tenant')->where('delete_status','0');
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
            'company_name' => 'required|unique:tenant|string|min:2|max:100', 
            'name' => 'required|string|min:2|max:100',
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


         
        return redirect('admin/tenant/list')->with('success', 'Company successfully created');   
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
        
        return redirect('admin/tenant/list')->with('success', 'Company successfully Updated');

    }

    public function updatestatus($id) {
        $tenant = User::where('id', '=', $id)->select('status')->first();

        $status = $tenant->status;
        $tenantstatus = 'Active';
        if($status == 'Active') {
            $tenantstatus = 'Inactive';
        }
        User::where('id', '=', $id)->update(['status' => $tenantstatus]);
          
        return redirect('admin/tenant/list')->with('success', 'Company status successfully updated');
    }
    public function destroy($id)
    {
        User::where('id', '=', $id)->update(['delete_status' => 1]);
        
        return redirect('admin/tenant/list')->with('success', 'Company details successfully deleted');
    }

}
