<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \OpenAI\Client;
use \OpenAI\Transporter\GuzzleTransporter; // Import the GuzzleTransporter class

class ChatbotController extends Controller
{
    public function index()
    {
        $yourApiKey = "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";

        // Create an instance of GuzzleTransporter with your API key
        $transporter = new GuzzleTransporter($yourApiKey);
        
        // Create an instance of the OpenAI client with the transporter
        $client = new Client($transporter);

        // Call the completions endpoint
        $result = $client->completions()->create([
            'model' => 'text-davinci-003',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => 'Can i open a bank account',
                ]
            ],
        ]);

        // Output the response
        echo $result->choices[0]->message->content;
    }
}
