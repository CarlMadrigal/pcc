<?php

namespace App\Http\Controllers;

use App\Models\Carabao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


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
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $carabao_form = [
            'name' => $request->name,
            'breed' => $request->breed,
            'weight' => $request->weight,
            'user_id' => $request->owner,
            'cooperative_id' => $request->cooperative
        ];
        Carabao::create($carabao_form);
        return redirect('/cooperative_details');
    }
}
