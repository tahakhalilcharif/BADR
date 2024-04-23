<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $userInput = $request->input('message');
        return response()->json(['text' => 'Response from Laravel']);
    }
}