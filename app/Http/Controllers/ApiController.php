<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Cooperative;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getCooperatives(Request $request){
        $cooperatives = Cooperative::all();

        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><data></data>');
        $xml->addChild('success', true);
        $xml->addChild('message', 'Sent Successfully');

        $cooperativesXml = $xml->addChild('cooperatives');
        $counter = 1;
        foreach ($cooperatives as $cooperative) {
            $cooperativeXml = $cooperativesXml->addChild('cooperative');
            $cooperativeXml->addAttribute('id', $counter++);
            
            $cooperativeXml->addChild('id', $cooperative->id);
            $cooperativeXml->addChild('name', $cooperative->name);
            $cooperativeXml->addChild('address', $cooperative->address);
            $cooperativeXml->addChild('contact', $cooperative->contact);
        }

        $xmlString = $xml->asXML();
        return response($xmlString)->header('Content-Type', 'text/xml');

        // $list = [];
        // foreach ($cooperatives as $cooperative){
        //     $coop_id = $cooperative['id'];
        //     $list[$coop_id] =  [
        //         'id' => $coop_id,
        //         'name' => $cooperative->name,
        //         'address' => $cooperative->address,
        //         'contact' => $cooperative->contact
        //     ];
        // };

        // return response()->json([
        //     "success" => true,
        //     "message" => "Sent Successfully",
        //     "cooperatives" => $list
        // ]);
    }

    public function registerUser(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|min:5|unique:users,username',
            'password' => 'required|min:8',
            'cooperative_id' => 'required|exists:cooperatives,id'
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'Email address already used',
            'username.required' => 'Username is required',
            'username.min' => 'At least 5 characters is required for username',
            'username.unique' => 'Username already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password should be at least 8 character',
            'cooperative_id.required' => 'Cooperative ID is required',
            'cooperative_id.exists' => 'Cooperative does not exists'
        ]);

        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            return response()->json([
                'success' => false,
                'message' => $message
            ], 400);

        }else{
            $token = Str::random(10);
            $user_form = [
                'name' => $request->name,
                'cooperative_id' => $request->cooperative_id,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'api_token' => $token,
                'role' => 'user'
            ];
            User::create($user_form);

            $notification = [
                'cooperative_id' => $request->cooperative_id,
                'title' => 'New User Successfully Registered',
                'message' => $request->name.'\'s Account has been Successfully Registered',
            ];
            Notification::create($notification);

            return response()->json([
                'success' => true,
                'message' => 'Successfully registered',
                'token' => $token
            ], 200);
            }

        
    }

    public function loginUser(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ]);

        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            return response()->json([
                'success' => false,
                'message' => $message
            ], 400);
        }else{
            $credentials = [
                'username' => $request->get('username'),
                'password' => $request->get('password')
            ];
    
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user->role == 'user') {
                    return response()->json([
                        'success' => true,
                        'message' => 'Successfully logged in',
                        'token' => $user->api_token
                    ], 200);
                }
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials'
                ], 400);
            }
    
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 400);
        }
    }

    public function getUserCarabaos(Request $request){
        $validator = Validator::make($request->all(), [
            'api_token' => 'required|exists:users,api_token',
        ], [
            'api_token.required' => 'API token is required',
            'api_token.exists' => 'API token does not exists'
        ]);

        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            return response()->json([
                'success' => false,
                'message' => $message
            ], 400);
        }else{
            $user = User::where('api_token', $request->api_token)->first();
            if (!$user || $user->role != 'user') {
                return response()->json([
                    'success' => false,
                    'message' => 'API token does not exists'
                ], 400);
            }

            $carabaos = [];
            foreach($user->carabaos as $carabao){
                $carabaos[$carabao->id] = [
                    'name' => $carabao->name,
                    'breed' => $carabao->breed,
                    'weight' => $carabao->weight
                ];
            }

            return response()->json([
                'success' => true,
                'message' => 'Successfully fetched',
                'carabaos' => $carabaos
            ], 200);
        } 
    }
}
