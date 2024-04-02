<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function verify(Request $request){
    $user = User::find($request->route('id'));

    if ($user->hasVerifiedEmail()) {
        return redirect($this->redirectPath());
    }

    if ($user->markEmailAsVerified()) {
        event(new EmailVerified($user));
    }

    return redirect($this->redirectPath())->with('verified', true);
    }
}