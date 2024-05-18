<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ClientActivationCode;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    public function inscrire(Request $request){
        $validatedData = $request->validate([
            'nom_dutilisateur' => ['required','string','max:255', Rule::unique('users','name')],
            'mot_de_passe' => 'required|string|min:8',
            'email' => ['required','email', Rule::unique('users','email')],
        ]);
    
        $user = User::create([
            'name' => $validatedData['nom_dutilisateur'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['mot_de_passe']),
        ]);
    
        $activationCode = ClientActivationCode::create([
            'user_id' => $user->id,
            'activation_code' => uniqid(),
            'is_activated' => false,
        ]);
    
        auth()->login($user);
        return redirect('/')->with('status', 'You have successfully registered ! If you may retrieve your activation code from the bank.');
    }
}
