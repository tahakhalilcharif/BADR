<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InscriptionController extends Controller
{
    public function login(Request $request){
        $validatedData = $request->validate([
            'login_nom_dutilisateur' => 'required',
            'login_mot_de_passe' => 'required',
        ]);

        if(auth()->attempt(['name' => $validatedData['login_nom_dutilisateur'], 'password' => $validatedData['login_mot_de_passe']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/inscription');
    }

    public function inscrire(Request $request){
        $validatedData = $request->validate([
            'nom_dutilisateur' => ['required','string','max:255', Rule::unique('users','name')],
            'mot_de_passe' => 'required|string|min:8',
            'email' => ['required','email', Rule::unique('users','email')]
        ]);
        $validatedData['name'] = $validatedData['nom_dutilisateur'];
        unset($validatedData['nom_dutilisateur']);
        $validatedData['password'] = bcrypt($validatedData['mot_de_passe']);
        $user = User::create($validatedData);
        auth()->login($user);

        return redirect('/');
    }
}
