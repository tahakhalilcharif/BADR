<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login(Request $request){
        $LogInData = $request->validate([
            'log_in_email' => 'required',
            'login_mot_de_passe' => 'required',
        ]);

        if(auth()->attempt(['email' => $LogInData['log_in_email'], 'password' => $LogInData['login_mot_de_passe']])){
            
            $user = Auth::user();
            $client = Client::where('user_id' , $user->id)->first();
            
            if($client){//if the user is a client
                
                $compte = Compte::where('id_client',$client->id_client)->first();
                
                if($compte){//if the client has an account
                    
                    $request->session()->regenerate();
                    
                    if($compte->hasActiveAccount())//if the account is active
                    {
                        return redirect()->intended('/');
                    }else{
                        //its commented for now 
                        //return redirect()->intended('/activer_compte');
                        return redirect()->intended('/');
                    }
                
                } else {
                    return redirect('/ouvrir_compte'); //open an account if the client doesn't have an account
                }
            }else{
                $request->session()->regenerate();
                return redirect('/creer_client'); //register as a client if the user isn't a client
            }
            
            
        }
        return back()->withErrors([
            'log_in_email' => 'These credentials do not match our records.',
        ]);

        //return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

}
