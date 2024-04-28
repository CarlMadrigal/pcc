<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    function cooperative(Request $request) {
        return view('cooperative');
    }

    function addCoop(Request $request) {
        return view('add-coop');
    }

    // public function test(Request $request){
    //     $users = User::where('username', 'robot_123');
    //     $users = User::all()->pluck('username');
    //     dd($users);
    // }
}
