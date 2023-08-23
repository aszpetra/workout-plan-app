<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \OpenAI;
use Inertia\Inertia;

class AiController extends Controller
{
    public function index() {
        return Inertia::render('Index');
    }

    public function makeRequest(Request $request) {
        $yourApiKey = "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";
        $client = OpenAI::client($yourApiKey);

        $result = $client->chat()->create([
            'model' => 'gpt-3.5-turbo-0613',
            'messages' => [
                ['role' => 'user', 'content' => $request->prompt]
            ],
        ]);

        $messageContent = $result['choices'][0]['message']['content'];

        dd($messageContent); // an open-source, widely-used, server-side scripting language.
    }
}
