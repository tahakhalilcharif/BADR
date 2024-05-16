<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'log_in_email' => 'required',
            'login_mot_de_passe' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $loginData['log_in_email'], 'password' => $loginData['login_mot_de_passe']])) {
            $user = Auth::user();
            if($user->isEmployee()){
                return redirect()->route('employee.home_emp');
            }
            $client = Client::where('user_id', $user->id)->first();
    
            if ($client) {
                $compte = Compte::where('id_client', $client->id_client)->first();
    
                if ($compte) {
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }
            } else {
                return redirect('/ouvrir_compte');
            }
        } else {
            $request->session()->regenerate();
                return redirect()->intended('/create-client');
        }
    
        return back()->withErrors([
            'log_in_email' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        auth()->logout();
        return redirect('/');
    }

}
