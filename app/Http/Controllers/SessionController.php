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
            $client = Client::where('user_id', $user->id)->first();
    
            if ($client) { // If the user is a client
                $compte = Compte::where('id_client', $client->id_client)->first();
    
                if ($compte) { // If the client has an account
                    if ($compte->hasActiveAccount()) { // If the account is active
                        $request->session()->regenerate();
                        $token = $request->session()->token();
                        if ($token) {
                            return redirect()->intended('/')->with('token', $token);
                        } 
                    } else {
                        // Redirect to inactive account page
                        return redirect('/activer_compte');
                    }
                } else {
                    // Redirect to open account page
                    return redirect('/ouvrir_compte');
                }
            } else {
                $request->session()->regenerate();
                $token = $request->session()->token();
                if ($token) {
                    return redirect()->intended('/create-client')->with('token', $token);
                } 
            }
        }
    
        // Redirect back with authentication failure message
        return back()->withErrors([
            'log_in_email' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

}
