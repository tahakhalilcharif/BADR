<?php

namespace App\Http\Controllers;
use Log;
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

    public function getBalance(Request $request){
        if (!auth()->check()) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    
        $userID = auth()->id();
    
        $client = Client::where('user_id', $userID)->first();
    
        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }
    
        $compte = Compte::where('id_client', $client->id_client)->first();
    
        if (!$compte) {
            return response()->json(['error' => 'Compte not found or not active'], 404);
        }
        //$compte = Compte::where('id_cmpt',7)->first();
        $balance = $compte->solde;
    
        return response()->json(['balance' => $balance], 200);
    }
    
    
}