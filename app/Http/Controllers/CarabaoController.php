<?php

namespace App\Http\Controllers;

use App\Models\Carabao;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CarabaoController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'breed' => 'required',
            'weight' => 'required',
            'owner' => 'required|exists:users,id',
            'cooperative' => 'required|exists:cooperatives,id'
        ], [
            'name.required' => 'Name is required',
            'breed.required' => 'Breed is required',
            'weight.required' => 'Weight is required',
            'owner.required' => 'Owner is required',
            'owner.exists' => 'Owner does not exists',
            'cooperative.required' => 'Cooperative is required',
            'cooperative.exists' => 'Cooperative does not exists'
        ]);
        
        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            flash()->addError($message);
            return back()->withInput();
        }else{
            
            $carabao_form = [
                'name' => $request->name,
                'breed' => $request->breed,
                'weight' => $request->weight,
                'user_id' => $request->owner,
                'cooperative_id' => $request->cooperative
            ];
            Carabao::create($carabao_form);

            $notification = [
                'cooperative_id' => $request->cooperative,
                'title' => 'Carabao Successfully Registered',
                'message' => 'Your '. $request->breed . ' has been Successfully Registered',
            ];
            Notification::create($notification);
            
            return redirect('/cooperative/'.$request->cooperative);
        }
    }
}
