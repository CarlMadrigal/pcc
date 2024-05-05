<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cooperative;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CooperativeController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'head' => 'required|min:5',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|min:5|unique:users',
            'password' => 'required|min:5',
            'confirmPassword' => 'required|same:password'
        ], [
            'name.required' => 'Cooperative name is required',
            'head.required' => 'Cooperative head is required',
            'head.min' => 'Coop Head should be at least 5 character',
            'address.required' => 'Cooperative address is required',
            'contact.required' => 'Cooperative contact number is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email address already used',
            'username.required' => 'Username is required',
            'username.min' => 'Username should be at least 5 character',
            'username.unique' => 'Username already exist',
            'password.required' => 'Password is required',
            'password.min' => 'Password should be at least 5 character',
            'confirmPassword' => 'Password doesn\'t match'
        ]);
        
        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            flash()->addError($message);
            return back()->withInput();
        }else{
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
    
            $cooperative_account_notification = [
                'cooperative_id' => $coop->id,
                'title' => 'Cooperative Account Registration Complete',
                'message' => $request->head.' Cooperative Account has been Successfully Registered and is now Active for Immediate Use.'
            ];
            Notification::create($cooperative_account_notification);
    
            $cooperative_notification = [
                'title' => 'New Cooperative Added',
                'message' => $request->name.' has been Successfully Created and Added.',
            ];
            Notification::create($cooperative_notification);
            
            $user->cooperative_id = $coop->id;
            $user->save();
            flash()->addSuccess('Cooperative successfully registered');
            return back();
        }
        
        
    }

    
}
