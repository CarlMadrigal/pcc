<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:5',
            'password' => 'required|min:5'
        ], [
            'username.required' => 'Username is required',
            'username.min' => 'Username should be at least 5 character',
            'password.required' => 'Password is required',
            'password.min' => 'Password should be at least 5 character'
        ]);
        
        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            flash()->addError($message);
            return back()->withInput();
        }else{
            $credentials = [
                'username' => $request->get('username'),
                'password' => $request->get('password')
            ];
    
            $user = User::where('username', $request->username)->first();   
            if ($user == null) {
                flash()->addError('Invalid credentials');
                return back()->withInput();
            }

            if ($user->role != 'admin') {
                flash()->addError('Invalid credentials');
                return back()->withInput();
            }

            if (Auth::attempt($credentials)) {
                flash()->addInfo('Welcome '.$user->name. '!');
                return redirect()->intended('/');
            }
            flash()->addError('Invalid credentials');
            return back()->withInput();
        }

        
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
