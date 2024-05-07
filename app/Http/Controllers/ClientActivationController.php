<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\ClientActivationCode;

class ClientActivationController extends Controller
{
    public function showActivationPage(Request $request)
    {
        $activationCode = $request->query('code');
        return view('activation_page', compact('activationCode'));
    }

    public function activateClient(Request $request)
    {
        $request->validate([
            'activation_code' => 'required|string'
        ]);

        $activationCode = $request->activation_code;

        $clientActivation = ClientActivationCode::where('activation_code', $activationCode)->first();

        if (!$clientActivation) {
            return redirect()->back()->with('error', 'Invalid activation code.');
        }

        $user = auth()->user() ;
        $user->update(['verified' => true]);

        $clientActivation->delete();

        return redirect('/')->with('success', 'Your account has been activated successfully!');
    }
}
