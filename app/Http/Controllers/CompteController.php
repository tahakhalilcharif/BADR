<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function new_account(Request $request)
    {
        $accountData = $request->validate([
            'classe' => 'required|in:201,202,300,390,397,398',
            'agence' => 'required|digits:5',
        ]);

        
        $user = auth()->user();
        $client = Client::where('user_id' , $user->id)->first();
        
        // Create a new Compte instance
        $compte = new Compte();
        $compte->id_client = $client->id_client;
        $compte->solde = 0; 
        $compte->derniere_trn = 0; 
        $compte->statut = 'bloque';
        $compte->date_ouv = Carbon::now();
        $compte->interdit_au_credit = 0;
        $compte->interdit_au_debit = 0; 
        $compte->banque = '003';
        $compte->agence = $accountData['agence'];
        $compte->num_serie = substr(str_shuffle("0123456789"), 0, 7); // Generate random num_serie
        $compte->classe = $accountData['classe']; // Set classe

        // Save the new account
        $compte->save();

        return redirect('/')->with('success', 'Account successfully created.');
    }


    public function show_info_compte($num_cmt)
    {
        $compte = Compte::where('num_cmt', $num_cmt)->first();

        if (!$compte) {
            return redirect()->back()->with('error', 'Account not found.');
        }

        return view('compte.info_compte', compact('compte'));
    }
    
}
