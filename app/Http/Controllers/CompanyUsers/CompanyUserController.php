<?php

namespace App\Http\Controllers\CompanyUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Tenant;
use App\Models\User;
use Session;
use Auth;
use Hash;

class CompanyUserController extends Controller
{
    public function dashboard()
    {
        $tenant_id = Session::get('tenant_id');
         $tenant = Tenant::where('id',$tenant_id)->first();
        return view('companyusers.dashboard')->with([
           'tenant' => $tenant
        ]);

    }
    public function profile()
    {
        $users = User::where('id', '=', Auth::user()->id)->first();
        $tenant_id = Session::get('tenant_id');
        $tenant = Tenant::where('id',$tenant_id)->first();
        return view('companyusers.profile')->with([
            'users' => $users,
            'tenant' =>$tenant
        ]);
    }
    public function profileedit($id)
    {
         $user = User::where('id', $id)->first();

        return view('companyusers.edit')->with([
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
        return redirect(route('companyusers.profile'));
    }
}
