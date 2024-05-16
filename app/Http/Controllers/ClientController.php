<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Client;
use App\Models\Compte;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use App\Models\FormeJuridique;
use Illuminate\Validation\Rule;
use App\Models\ClientActivationCode;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SessionController;

class ClientController extends Controller
{

    public function showClientCreationForm()
    {
        $wilayas = Wilaya::all();
        $formesJuridiques = FormeJuridique::all();
        return view('creation_du_client', ['wilayas'=>$wilayas , 'formesJuridiques'=>$formesJuridiques]);
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
        $client->user_id = auth()->user()->id;
        $client->save();

        $activationCode = ClientActivationCode::create([
            'id_client' => $client->id,
            'activation_code' => uniqid(),
        ]);

        return redirect()->route('activation.page', ['code' => $activationCode->activation_code]);
    }

    public function showClientRegistrationForm()
    {
        $wilayas = Wilaya::all();
        return view('creation_du_client', ['wilayas' => $wilayas]);
    }


    public function nv_client(Request $request)
    {

        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'date_n' => 'required|date',
            'sexe'=>['required',Rule::in(['Homme' ,'Femme'])],
            'lieu_n' => 'required|string|max:100',
            'numero_telephone' => 'required|string|max:100',
            'adresse' => 'required|string|max:100',
            'select_wilaya' => 'required|string|max:255',
            'commune' => 'required|string|max:100',
            'daira' => 'required|string|max:100',
            'categorie' => ['required', Rule::in(['Personne Physique', 'Personne Morale'])],
            'statut' => ['required', Rule::in(['vivant', 'mort'])],
        ]);

        $userEmail = Auth::user()->email;

        $client = Client::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'date_N' => $validatedData['date_n'],
            'sexe'=> $validatedData['sexe'],
            'lieu_N' => $validatedData['lieu_n'],
            'num_tlf' => $validatedData['numero_telephone'],
            'adresse' => $validatedData['adresse'],
            'wilaya' => $validatedData['select_wilaya'],
            'daira' => $validatedData['daira'],
            'commune' => $validatedData['commune'],
            'categorie' => $validatedData['categorie'],
            'statut' => $validatedData['statut'],
            'user_id' => auth()->id(),
            'email' => $userEmail,
        ]);

        auth()->logout();
        return redirect('/login');
    }

    public function show_info()
    {
        $user = Auth::user();
        $userID = Auth::id();

        if ($userID) {
            $client = Client::where('user_id', $userID)->first();

            if ($client) {
                $comptes = Compte::where('id_client', $client->id_client)->get();
                $totalBalance = $comptes->sum('solde');

                return view('compte.info_client', [
                    'client' => $client,
                    'comptes' => $comptes,
                    'user' => $user,
                    'totalBalance' => $totalBalance
                ]);
            }
        }
    }

    public function showChangePasswordForm()
    {
        return view('compte.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('compte.info_client')->with('success', 'Password updated successfully.');
    }


    public function showChangeEmailForm()
    {
        return view('compte.change_email');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update the email in the users table
        $user->email = $request->new_email;
        $user->save();

        // Update the email in the clients table
        $client = $user->client;
        if ($client) {
            $client->email = $request->new_email;
            $client->save();
        }

        return redirect()->route('compte.info_client')->with('success', 'Email updated successfully.');
    }


    public function showChangePhoneNumberForm()
    {
        return view('compte.change_phone_number');
    }

    public function updatePhoneNumber(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_phone_number' => 'required|numeric|digits:10|unique:clients,num_tlf',
        ]);

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update the phone number in the clients table
        $client = $user->client;
        if ($client) {
            $client->num_tlf = $request->new_phone_number;
            $client->save();
        }

        return redirect()->route('compte.info_client')->with('success', 'Phone number updated successfully.');
    }
}
