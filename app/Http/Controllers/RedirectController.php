<?php

namespace App\Http\Controllers;

use App\Models\Need;
use App\Models\User;
use App\Models\Carabao;
use App\Models\Cooperative;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    function redirectToHomepage(Request $request) {
        if(Auth::check()){
            $carabao = Carabao::all();
            $heathy = Carabao::where('status', 'Healthy')->get();
            $unheathy = Carabao::where('status', 'Sick')->get();
            $pregnant = Carabao::where('status', 'Pregnant')->get();
            $coop = User::where('role', 'coop_head')->get();
            $user = User::where('role', 'user')->get();
            $notif = Notification::orderBy('created_at', 'desc')->get();
            return view('dashboard',[
                'carabaos' => $carabao,
                'healthy' => $heathy,
                'unhealthy' => $unheathy,
                'pregnant' => $pregnant,
                'users' => $user,
                'coops' => $coop,
                'notifs' => $notif
            ]);
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
        $milk = Need::where('cooperative_id', $id)->sum('milk');
        $cooperative = Cooperative::find($id);
        if (!$cooperative) {
            flash()->addError('Cooperative not found!');
            return redirect('/cooperative');
        }
        return view('cooperative_details', [
            'cooperative' => $cooperative,
            'milks' => $milk
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
    
    function redirectToAnalyticspage(Request $request) {
        $carabao = Carabao::all();
        $heathy = Carabao::where('status', 'Healthy')->get();
        $unheathy = Carabao::where('status', 'Sick')->get();
        $pregnant = Carabao::where('status', 'Pregnant')->get();
        $user = User::where('role', 'user')->get();
        $coop = User::where('role', 'coop_head')->get();
        return view('analytics',[
            'carabaos' => $carabao,
            'healthy' => $heathy,
            'unhealthy' => $unheathy,
            'pregnant' => $pregnant,
            'coops' => $coop,
            'users' => $user
        ]);
    }
    
    function redirectToUploadMaterialspage(Request $request) {
        return view('upload_materials');
    }
}
