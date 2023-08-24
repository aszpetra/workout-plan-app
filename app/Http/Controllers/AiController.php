<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \OpenAI;
use Inertia\Inertia;

class AiController extends Controller
{
    public function index() {
        return Inertia::render('Index', [
            'plan' => ' '
        ]);
    }

    public function makeRequest(Request $request) {
        $apiKey = env('API_KEY');
        $client = OpenAI::client($apiKey);

        $user_message = "Make me a workout plan based on the following: I'm $request->age years old $request->gender, and I weight around $request->weight kg. I want to work out $request->place $request->frequency, focusing on $request->focus. My goal is $request->goal.";
        
        if($request->extra != null){
            $user_message = "$user_message And the following should also be taken into account: $request->extra";
        }

        $result = $client->chat()->create([
            'model' => 'gpt-3.5-turbo-0613',
            'messages' => [
                ['role' => 'user', 'content' => $user_message]
            ],
        ]);

        $messageContent = $result['choices'][0]['message']['content'];
        $lines = explode("\n", $messageContent);

        return Inertia::render('Plan', [
            'plan' => $lines
        ]);
        
    }
}
