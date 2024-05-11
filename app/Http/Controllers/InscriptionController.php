<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

        $token = $user->createToken('registration')->plainTextToken;

        auth()->login($user);
        return redirect('/create-client');
    }
}
