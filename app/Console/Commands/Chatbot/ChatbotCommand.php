<?php

namespace App\Console\Commands\Chatbot;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ChatbotCommand extends Command
{
    protected $signature = 'chatbot:message {message}';
    protected $description = 'Send a message to the chatbot';

    public function handle()
    {
        $message = $this->argument('message');

        // Call the chatbot Python script and pass the user's message as an argument
        $chatbotResponse = shell_exec("python " . base_path('app/Chatbot/chatbot.py') . " '$message'");

        // Print the chatbot's response
        $this->info($chatbotResponse);

        return 0;
    }
}