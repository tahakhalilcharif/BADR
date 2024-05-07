<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function showCardOrderFormPP(){
        $clientId = auth()->user()->client->id_client;
        $compte = Compte::where('id_client' , $clientId)->first();

    
    }
}
