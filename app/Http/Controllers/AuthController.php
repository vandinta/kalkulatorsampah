<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'     => 'required|email',
                'password'  => 'required'
            ],
            [
                'email.required' => 'Email Tidak Valid.',
                'email.email' => 'Email Tidak Valid.',
                'password.required' => 'Password Tidak Valid.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::where('email',$request->email)->first();
        
        if ($user == null) {
            Session::flash('login_error', 'Pastikan Username dan Password Anda Benar!!!.');
            return redirect()->back();
        }
        
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return back()->with('login_error', 'Pastikan Username dan Password Anda Benar!!!' );
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
