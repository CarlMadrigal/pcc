<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Need;
use Illuminate\Http\Request;

class NeedController extends Controller
{
    public function updateFeed(Request $request){
        $validator = Validator::make($request->all(), [
            'carabao_id' => 'required|exists:carabaos,id',
            'feed' => 'required|numeric',
        ], [
            'carabao_id.required' => 'Carabao ID is required',
            'carabao_id.exists' => 'Carabao does not exists',
            'feed.required' => 'Feed is required',
            'feed.numeric' => 'Feed should be numeric',
        ]);
        
        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            flash()->addError($message);
            return back()->withInput();
        }

        $need_form = [
            'carabao_id' => $request->carabao_id,
            'feed' => $request->feed,
        ];

        $currentDate = now()->toDateString();
        $need = Need::whereDate('created_at', $currentDate)->first();
        if($need == null){
            Need::create($need_form);
        }
        else {
            $need->feed = $request->feed;
            $need->save();
        }

        flash()->addSuccess('Feed updated successfully');
        return back();
    }

    public function updateWater(Request $request){
        $validator = Validator::make($request->all(), [
            'carabao_id' => 'required|exists:carabaos,id',
            'water' => 'required|numeric',
        ], [
            'carabao_id.required' => 'Carabao ID is required',
            'carabao_id.exists' => 'Carabao does not exists',
            'water.required' => 'Water is required',
            'water.numeric' => 'Water should be numeric',
        ]);
        
        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            flash()->addError($message);
            return back()->withInput();
        }

        $need_form = [
            'carabao_id' => $request->carabao_id,
            'water' => $request->water,
        ];

        $currentDate = now()->toDateString();
        $need = Need::whereDate('created_at', $currentDate)->first();
        if($need == null){
            Need::create($need_form);
        }
        else {
            $need->feed = $request->feed;
            $need->water = $request->water;
            $need->milk = $request->milk;
            $need->vitamin = $request->vitamin;
            $need->save();
        }

        flash()->addSuccess('Water updated successfully');
        return back();
    }

    public function updateMilk(Request $request){
        $validator = Validator::make($request->all(), [
            'carabao_id' => 'required|exists:carabaos,id',
            'milk' => 'required|numeric',
        ], [
            'carabao_id.required' => 'Carabao ID is required',
            'carabao_id.exists' => 'Carabao does not exists',
            'milk.required' => 'Milk required',
            'milk.numeric' => 'Milk should be numeric',
        ]);
        
        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            flash()->addError($message);
            return back()->withInput();
        }

        $need_form = [
            'carabao_id' => $request->carabao_id,
            'milk' => $request->milk,
        ];

        $currentDate = now()->toDateString();
        $need = Need::whereDate('created_at', $currentDate)->first();
        if($need == null){
            Need::create($need_form);
        }
        else {
            $need->milk = $request->milk;
            $need->save();
        }

        flash()->addSuccess('Milk updated successfully');
        return back();
    }

    public function updateVitamin(Request $request){
        $validator = Validator::make($request->all(), [
            'carabao_id' => 'required|exists:carabaos,id',
            'vitamin' => 'required|numeric'
        ], [
            'carabao_id.required' => 'Carabao ID is required',
            'carabao_id.exists' => 'Carabao does not exists',
            'vitamin.exists' => 'Vitamins is required',
            'vitamin.numeric' => 'Vitamins should be numeric',
        ]);
        
        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            flash()->addError($message);
            return back()->withInput();
        }

        $need_form = [
            'carabao_id' => $request->carabao_id,
            'vitamin' => $request->vitamin
        ];

        $currentDate = now()->toDateString();
        $need = Need::whereDate('created_at', $currentDate)->first();
        if($need == null){
            Need::create($need_form);
        }
        else {
            $need->vitamin = $request->vitamin;
            $need->save();
        }

        flash()->addSuccess('Vitamin updated successfully');
        return back();
    }
}
