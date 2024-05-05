<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cooperative;
use App\Models\Notification;
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
        $users = User::where('role', 'user')->where('cooperative_id', $request->id)->get();
        return view('register_carabao', [
            'users' => $users
        ]);
    }
    
    function redirectToNotificationpage(Request $request) {
        $notif = Notification::orderBy('created_at', 'desc')->get();
        return view('notification',[
            'notifs' => $notif
        ]);
    }
}
