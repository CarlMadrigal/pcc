<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cooperative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    function redirectToHomepage(Request $request) {
        if(Auth::check()){
            return view('dashboard');
        }
        
        return view('login');
    }

    function redirectToCooperativePage(Request $request) {
        $cooperatives = Cooperative::all();
        return view('cooperative', [
            'cooperatives' => $cooperatives
        ]);
    }

    function redirectToRegisterCoop(Request $request) {
        return view('register_cooperative');
    }
    
    function redirectToCooperativeDetailsPage(Request $request) {
        $id = request()->route('id');
        $cooperative = Cooperative::find($id);
        if (!$cooperative) {
            flash()->addError('Cooperative not found!');
            return redirect('/cooperative');
        }
        return view('cooperative_details', [
            'cooperative' => $cooperative
        ]);
    }

    function redirectToRegisterCarabaoPage(Request $request) {
        $users = User::where('role', 'user')->get();
        return view('register_carabao', [
            'users' => $users
        ]);
    }
    
    function redirectToNotification(Request $request) {
        return view('notification');
    }

    // public function test(Request $request){
    //     $users = User::where('username', 'robot_123');
    //     $users = User::all()->pluck('username');
    //     dd($users);
    // }
}
