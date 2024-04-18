<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SessionController;

class ClientController extends Controller
{
    public function nv_client(Request $request){

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

    public function show_info(){
        $userID = Auth::user()->id;

        if($userID)
        {
            $client = Client::where('user_id',$userID)->first();
            $comptes = Compte::where('id_client',$client['id_client'])->get();
            
            return view('compte.info_client',['client'=>$client,'comptes'=>$comptes]);
        }

        return view('compte.info_client');
    }

    public function showChangePasswordForm()
    {
        return view('compte.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $user->password = bcrypt($request->new_password);
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

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user = auth()->user();
        $user->email = $request->new_email;
        $user->save();

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

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $id = Auth::user()->id;
        $client = Client::where('id_client',Auth::user()->id)->first();
        $client->num_tlf = $request->new_phone_number;
        $client->save();

        return redirect()->route('compte.info_client')->with('success', 'Phone number updated successfully.');
    }
}
