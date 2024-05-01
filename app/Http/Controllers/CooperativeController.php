<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Cooperative;

class CooperativeController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'head' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|min:5|unique:users',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password'
        ], [
            'name.required' => 'Cooperative name is required',
            'head.required' => 'Cooperative head is required',
            'address.required' => 'Cooperative address is required',
            'contact.required' => 'Cooperative contact number is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email address already used',
            'username.required' => 'Username is required',
            'username.min' => 'At least 5 characters is required for username',
            'username.unique' => 'Username already exist',
            'password.required' => 'Password is required',
            'password.min' => 'Password should be at least 8 character',
            'confirmPassword' => 'Password doesn\'t match'
        ]);
        
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }
        
        $user_form = [
            'name' => $request->head,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'coop_head'
        ];
        $user = User::create($user_form);
        $coop_form = [
            'name' => $request->name,
            'user_id' => $user->id,
            'address' => $request->address,
            'contact' => $request->contact
        ];
        $coop = Cooperative::create($coop_form);
        $user->cooperative_id = $coop->id;
        $user->save();
        flash()->addSuccess('Cooperative successfully registered');
        return back();
    }

    
}
