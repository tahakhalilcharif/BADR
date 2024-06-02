<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Carte;
use App\Models\Client;
use App\Models\Compte;
use App\Models\Wilaya;
use App\Models\Demande;
use App\Models\ListeAgence;
use App\Models\Transaction;
use App\Models\ClasseCompte;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ClientActivationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CompteController extends Controller
{

    public function showForm()
    {
        $classes = ClasseCompte::all();
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->first();
        $wilayas=Wilaya::where('wilaya' , $client->wilaya)->first();
        $code=$wilayas->code;
        $agences = ListeAgence::where('code_wilaya' , $code)->get() ;
        return view('creation_du_compte', ['classes' => $classes ,'agences' => $agences]);
    }

    public function new_account(Request $request)
    {
        $request->validate([
            'classe' => 'required|exists:classe_comptes,classe',
            'agence' => 'required|string',
        ]);

        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->first();

        $classe = ClasseCompte::where('classe', $request->classe)->first();

        if (!$classe) {
            return redirect()->back()->with('error', 'Invalid account class selected.');
        }

        $compte = new Compte();
        $compte->id_client = $client->id_client;
        $compte->solde = 0;
        $compte->derniere_trn = 0;
        $compte->date_ouv = now();
        $compte->interdit_au_credit = 0;
        $compte->interdit_au_debit = 0;
        $compte->banque = '003';
        $agenceCode = ListeAgence::where('code_agence' , $request->agence)->value('code_agence');
        $agenceCode = str_pad($agenceCode, 5, '0', STR_PAD_LEFT);
        $compte->agence = $agenceCode;
        $compte->num_serie = substr(str_shuffle("0123456789"), 0, 7);
        $compte->classe = $classe->classe;

        $compte->save();

        return redirect('/compte')->with('success', 'Account successfully created.');
    }


    public function show_info_compte($num_cmt)
    {
        $user = auth()->user();
        $client = Client::where('user_id', $user->id)->first();
        $compte = Compte::where('num_cmt', $num_cmt)->first();
        if (!$compte) {
            return redirect()->back()->with('error', 'Account not found.');
        }

        $demandes = Demande::where('id_compte', $compte->id_cmpt)->get();

        $cartes = $demandes->map(function($demande) {
            return Carte::where('id_carte', $demande->id_carte)->first();
        });

        return view('compte.info_compte', compact('compte', 'demandes', 'cartes' ,'client'));
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
        $client = Client::where('id_client',$compte->id_client)->first();

        if (!$compte) {
            return redirect()->back()->with('error', 'Compte not found.');
        }

        return view('compte.show_products', compact('compte' ,'client'));
    }

    public function transferMoney(Request $request)
    {
        $request->validate([
            'recipient_account_number' => 'required|exists:comptes,num_cmt',
            'amount' => 'required|numeric|min:1',
            'source_account_id' => 'required|exists:comptes,id_cmpt',
        ]);
    
        $user = auth()->user();
        $client = Client::where('id_client', $user->id)->first();
        $sourceAccount = Compte::where('id_cmpt', $request->input('source_account_id'))->first();
    
        if (!$sourceAccount) {
            return redirect()->back()->with('error', 'Source account does not exist.');
        }
    
        $recipientAccount = Compte::where('num_cmt', $request->input('recipient_account_number'))->first();
    
        if (!$recipientAccount) {
            return redirect()->back()->with('error', 'Recipient account does not exist.');
        }
    
        if ($sourceAccount->solde < $request->input('amount')) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }
    

    
        $transactionS = new Transaction();
        $transactionS->id_compte_source = $sourceAccount->id_cmpt; 
        $transactionS->id_compte_destination = $recipientAccount->id_cmpt;  
        $transactionS->montant = $request['amount'];
        $transactionS->type = 'D';
        $transactionS->date_trn = now();
        $transactionS->save();
    
        $transactionD = new Transaction();
        $transactionD->id_compte_source = $recipientAccount->id_cmpt;  
        $transactionD->id_compte_destination = $sourceAccount->id_cmpt;
        $transactionD->montant = $request['amount'];
        $transactionD->type = 'C';
        $transactionD->date_trn = now();
        $transactionD->save();

        if($transactionD && $transactionS){
            $sourceAccount->solde -= $request['amount'];
            $recipientAccount->solde += $request['amount'];
        
            $sourceAccount->save();
            $recipientAccount->save();
        }

    
        return redirect()->back()->with('success', 'Money transferred successfully.');
    }
    

    public function showOrderProductPage($id)
    {
        $compte = Compte::findOrFail($id);
        $client = auth()->user()->client;
        if($client->revenu<100000){
            $cartes = Carte::where('id_carte',1)->get();
        }else{
            $cartes = Carte::where('id_carte',2)->get();
        }

        return view('compte.demand_product', compact('compte' , 'cartes'));
    }

    public function storeProductOrder(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required', 
        ]);

        $demande = new Demande();

        $demande->id_client = auth()->user()->client->id_client;
        $demande->id_carte = $request->product_name;
        $demande->id_compte = $id; 
        $demande->date_demande = Carbon::now();
        $demande->statut = 'en attente';

        $demande->save();

        return redirect()->route('compte.info_client');
    }

    public function showTransactionPage($num_cmt){
        $compte = Compte::where('num_cmt',$num_cmt)->first();
        return view('compte.transaction' , compact('compte'));
    }

    public function accountStatement($num_cmt)
    {
        $compte = Compte::where('num_cmt', $num_cmt)->firstOrFail();
        $transactions = Transaction::where('id_compte_source', $compte->id_cmpt)->get();

        return view('compte.account_statement', compact('compte', 'transactions'));
    }
}
