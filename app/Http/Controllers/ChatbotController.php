<?php

namespace App\Http\Controllers;
use GeminiAPI\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Process the user's message and return a response
        $userInput = $request->input('message');
        // Your processing logic here...
        
        // Return a response (e.g., as JSON)
        return response()->json(['text' => 'Response from Laravel']);
    }
}