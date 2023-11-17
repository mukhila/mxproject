<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use App\User;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/role';    
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth/login');
    }
    public function showLoginForm()
    {
        return view('auth/login');
    }
    public function loginNew(Request $request)
    {

         $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

    
        $credentials = $request->only('email', 'password');

      

        if (Auth::attempt($credentials)) {

     
        return redirect(route('role'));
        }else{
            return redirect(route('login'))->with([
                'error' => "Invalid Credentials."
            ]);
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();       
        return redirect(route('login'));
    }

}
