<?php

namespace App\Http\Controllers;
use Log;
use App\Models\Client;
use App\Models\Compte;
use App\Models\Transaction;
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
        
        $balance = $compte->solde;
    
        return response()->json(['balance' => $balance], 200);
    }

    public function CheckStatus(Request $request)
    {

    }

    public function OrderProduct(Request $request)
    {

    }

    public function getAccountDetails(Request $request)
    {

    }
    
    public function transfer(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric', 
            'recipient' => 'required|string', 
            'source'=> 'required|string',
        ]);
    
        $user = auth()->user();
        $client = $user->client;
        $source_account = Compte::where('num_cmt', $request->input('source'))->firstOrFail();
        $destination_account = Compte::where('num_cmt', $request->input('recipient'))->firstOrFail();
        $amount = $request->input('amount');

        if ($source_account->solde < $request->input('amount')) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }
    
    
        if ($source_account && $destination_account && $amount) {
            
            $transactionS = new Transaction();
            $transactionS->id_compte_source = $source_account->id_cmpt; 
            $transactionS->id_compte_destination = $destination_account->id_cmpt;  
            $transactionS->montant = $request['amount'];
            $transactionS->type = 'D';
            $transactionS->date_trn = now();
            $transactionS->save();
        
            $transactionD = new Transaction();
            $transactionD->id_compte_source = $destination_account->id_cmpt;  
            $transactionD->id_compte_destination = $source_account->id_cmpt;
            $transactionD->montant = $request['amount'];
            $transactionD->type = 'C';
            $transactionD->date_trn = now();
            $transactionD->save();
    
            if($transactionD && $transactionS){
                $source_account->solde -= $request['amount'];
                $destination_account->solde += $request['amount'];
        
                $source_account->save();
                $destination_account->save();
            }
    
            return response()->json(['status' => 'success', 'message' => 'Transfer completed successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Invalid transfer details.'], 400);
        }
    }
    
    

    public function getTransactions(Request $request)
    {
        $user = auth()->user();
        $client = $user->client;
        $compte = Compte::where('id_client', $client->id_client)->firstOrFail();
        $transactions = Transaction::where('id_compte_source', $compte->id_cmpt)
            ->orderBy('date_trn', 'desc')
            ->take(5)
            ->get();

        $transactionsData = $transactions->map(function($transaction) {
            $dest_acc = Compte::where('id_cmpt', $transaction->id_compte_destination)->first();
            $dest_acc_no = $dest_acc->num_cmt ;
            return [
                'date' => $transaction->date_trn,
                'amount' => $transaction->montant,
                'currency' => 'dzd',
                'type' => $transaction->type,
                'destination_account' => $dest_acc_no,
            ];
        });

        return response()->json(['transactions' => $transactionsData], 200);
    }
    
    
}