<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('auth.adminLogin');

    }
    public function login(Request $request){
        //validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //Attempt to login
        if (Auth::guard('admin')->attempt($credentials, $request->remember)){
            // if succesfull redirect to admin page
            return redirect()->intended(route('admin.index'));
        }

        //if unsuccessfull redirect loginform
        return redirect()->back()->withInput($request->only('email'));
    }
}
