<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Compte;
use App\Models\Demande;
use Illuminate\Http\Request;
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
        $users = ClientActivationCode::where('is_activated', false)->get();
        return view('employee.users', compact('users'));
    }

    public function demands()
    {
        $demands = Demande::all();
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

    public function addClient()
    {
        return view('employee.add_client');
    }

    public function storeClient(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'num_tlf' => 'required|string|max:15',
            'adresse' => 'required|string|max:255',
        ]);

        Client::create($validatedData);

        return redirect()->route('employee.clients')->with('success', 'Client added successfully');
    }
}
