<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $userInput = $request->input('message');
        return response()->json(['text' => 'Response from Laravel']);
    }

    public function getBalance(Request $request)
    {
        $accountType = $request->input('account_type');

        $user = Auth::user();
        $userID = Auth::id();
        $client = Client::where('user_id', $userID)->first();
        $comptes = Compte::where('id_client', $client->id_client)->get();
        $balance = $comptes->sum('solde');

        return response()->json(['balance' => $balance]);
    }

}