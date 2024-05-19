<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Compte;
use App\Models\Wilaya;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\FormeJuridique;
use App\Models\ClientActivationCode;

class EmployeeController extends Controller
{
    public function index()
    {
        $clientCount = Client::count();
        $demandCount = Demande::count();
        $accountsCount = Compte::count();
        $unactivatedUsersCount = ClientActivationCode::where('is_activated', false)->count();

        return view('employee.home_emp', compact('clientCount', 'accountsCount' , 'demandCount', 'unactivatedUsersCount'));
    }

    public function unactivatedUsers()
    {
        $unactivatedUsers = ClientActivationCode::where('is_activated', false)->get();

        return view('employee.unactivated_users', compact('unactivatedUsers'));
    }

    public function clients()
    {
        $clients = Client::all();
        return view('employee.clients', compact('clients'));
    }

    public function users()
    {
        $unactivated_users = User::with('activationCode')->whereHas('activationCode', function($query) {
            $query->where('is_activated', false);
        })->get();

        $users = User::all();
    
        return view('employee.users', compact('unactivated_users' , 'users'));
    }
    

    public function demands()
    {
        $demands = Demande::with(['client', 'carte', 'compte'])->get();
        return view('employee.demands', compact('demands'));
    }

    public function accounts()
    {
        $accounts = Compte::with('client')->get();
        return view('employee.accounts' , compact('accounts'));
    }

    public function statistics()
    {
        return view('employee.statistics');
    }

    public function showClientCreationForm()
    {
        $wilayas = Wilaya::all();
        $formesJuridiques = FormeJuridique::all();
        return view('employee.add_client', ['wilayas'=>$wilayas , 'formesJuridiques'=>$formesJuridiques]);
    }

    public function createClient(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'revenu' => 'required|numeric',
            'sexe' => 'required|in:homme,femme',
            'date_n' => 'required|date',
            'lieu_n' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'num_tlf' => 'required|string',
            'adresse' => 'required|string',
            'select_wilaya' => 'required|string',
            'commune' => 'required|string',
            'daira' => 'required|string',
            'category' => 'required|in:Personne Physique,Personne Morale',
            'type' => 'nullable|in:Professionnel,Commercant,Particulier',
            'forme_juridique_id' => 'nullable|string',
            'denomination' => 'nullable|string',
            'activite' => 'nullable|string',
            'status' => 'nullable|in:vivant,mort',
        ]);



        $client = new Client();
        $client->nom = $validatedData['nom'];
        $client->prenom = $validatedData['prenom'];
        $client->revenu = $validatedData['revenu'];
        $client->sexe = $validatedData['sexe'];
        $client->date_n = $validatedData['date_n'];
        $client->lieu_n = $validatedData['lieu_n'];
        $client->email = $validatedData['email'];
        $client->num_tlf = $validatedData['num_tlf'];
        $client->adresse = $validatedData['adresse'];
        $client->wilaya = $validatedData['select_wilaya'];
        $client->commune = $validatedData['commune'];
        $client->daira = $validatedData['daira'];
        $client->category = $validatedData['category'];
        $client->type = $validatedData['type'];
        $client->forme_juridique_id = $validatedData['forme_juridique_id'];
        $client->denomination = $validatedData['denomination'];
        $client->activite = $validatedData['activite'];
        $client->status = "vivant";

        $user = User::where('email',$client->email)->first();
        $client->user_id = $user->id;
        $client->save();

        if($client){
            return redirect()->route('employee.clients');
        }

        return redirect()->back();

    }
}
