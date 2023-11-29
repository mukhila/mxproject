<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;


class UserController extends Controller
{
    public function list()
    {
        $users = User::where('role', '!=', 'Tenant')->orderBy('id', 'desc')->get();

        return view('user.index')->with([
            'users' => $users
        ]);
    }

    public function add()
    {
        return view('user.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',          
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->gender = $request->gender;
        $timestamp = strtotime($request->dob);
        $user->dob = date('Y-m-d', $timestamp);
        $user->status = 'Active';
        $user->save();

     
        return redirect('/user/list')->with('success', 'User successfully created');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('user.edit')->with([
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
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
            "role" => $request->role,
            
        ]);
        
        // Update User Password
        if($request->password){
            User::where('id', $request->id)->update([            
                'password' => Hash::make($request->password)
            ]);
        }

      
        return redirect('/user/list')->with('success', 'User successfully Updated');
    }

    public function updatestatus($id) {
        $user = User::where('id', '=', $id)->select('status')->first();
        $status = $user->status;
        $userstatus = 'Active';
        if($status == 'Active') {
            $userstatus = 'Inactive';
        }
        User::where('id', '=', $id)->update(['status' => $userstatus]);
      
        return redirect('/user/list')->with('success', 'User status successfully updated');
    }
    public function destroy($id)
    {
        User::where('id', '=', $id)->update(['delete_status' => 1]);
   
        return redirect('/user/list')->with('success', 'User details successfully deleted');
    }
}
