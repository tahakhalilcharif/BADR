<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $user=auth()->user();
        $client = Client::where('user_id',$user->id)->first();
        $comptes = $client->compte()->get();
        return view('/' , ['comptes' => $comptes]);
    }
}
