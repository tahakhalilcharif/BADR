<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;
use App\Models\ClientActivationCode;
use Illuminate\Support\Facades\Redirect;

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
        $compte->num_serie = substr(str_shuffle("0123456789"), 0, 7);
        $compte->classe = $accountData['classe'];

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

    public function activate($num_cmt)
    {
        $compte = Compte::where('num_cmt', $num_cmt)->first();

        if ($compte && $compte->statut === 'bloque') {
            $activationCode = mt_rand(100000, 999999);

            $clientActivationCode = new ClientActivationCode();
            $clientActivationCode->id_client = $compte->id_client;
            $clientActivationCode->activation_code = $activationCode;
            $clientActivationCode->save();

            return redirect()->route('compte.activation_page', ['num_cmt' => $num_cmt, 'activation_code' => $activationCode]);
        }

        return redirect()->back()->with('error', 'Account activation failed. Please try again.');
    }

    public function activationPage($num_cmt, $activation_code)
    {
        $compte = Compte::where('num_cmt', $num_cmt)->first();
        $clientActivationCode = ClientActivationCode::where('id_client', $compte->id_client)
                                                    ->where('activation_code', $activation_code)
                                                    ->first();
    
        if ($compte && $clientActivationCode) {
            return view('compte.activation_page', ['compte' => $compte, 'activation_code' => $activation_code]);
        }
    
        return redirect()->back()->with('error', 'Invalid activation link. Please try again.');
    }
    
    public function processActivation(Request $request, $num_cmt, $activation_code)
    {
        $compte = Compte::where('num_cmt', $num_cmt)->first();
        $clientActivationCode = ClientActivationCode::where('id_client', $compte->id_client)
                                                    ->where('activation_code', $activation_code)
                                                    ->first();
    
         if ($compte && $clientActivationCode) {
            if ($request->activation_code == $activation_code) {
                $compte->statut = 'actif';
                $compte->save();
    
                return Redirect::route('compte.info_client')->with('success', 'Account activated successfully.');
            } else {
                return redirect()->back()->with('error', 'Invalid activation code. Please try again.');
            }
        }
    
        return redirect()->back()->with('error', 'Invalid activation link. Please try again.');
    }
    
    public function showProducts($id)
{
    $compte = Compte::with('produits')->find($id);

    if (!$compte) {
        return redirect()->back()->with('error', 'Compte not found.');
    }

    return view('compte.show_products', compact('compte'));
}
}
