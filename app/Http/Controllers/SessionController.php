<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login(Request $request){
        $LogInData = $request->validate([
            'log_in_email' => 'required',
            'login_mot_de_passe' => 'required',
        ]);

        if(auth()->attempt(['email' => $LogInData['log_in_email'], 'password' => $LogInData['login_mot_de_passe']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
    
}
