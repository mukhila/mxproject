<?php
namespace App\Http\Controllers\Tenant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\Tenant;
use Session;
use Auth;
use Hash;
class TenantController extends Controller
{
    public function dashboard()
    {
        $tenant_id =  Session::get('tenant_id');
        $user = User::where('id', Auth::user()->id)->first();
        $tenant = Tenant::where('userid',$tenant_id)->first();
        return view('tenant.dashboard')->with([
           'tenant' => $tenant,
           'user' => $user
        ]);
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
