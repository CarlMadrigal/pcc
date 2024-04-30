<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ], [
            'username.required' => 'Username is required',
            'username.min' => 'At least 5 characters is required for username',
            'password.required' => 'Password is required',
            'password.min' => 'Password should be at least 8 character'
        ]);
        
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $credentials = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role != 'admin') {
                flash()->addError('Invalid credentials');
                return back()->withInput();
            }
            $request->session()->regenerate();
            flash()->addInfo('Welcome back '.$user->name. '!');
            return redirect()->intended('/');
        }

        flash()->addError('Invalid credentials');
        return back()->withInput();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
