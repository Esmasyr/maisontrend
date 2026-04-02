<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $response = Http::withHeaders([
            'x-api-key' => env('ANTHROPIC_API_KEY'),
            'anthropic-version' => '2023-06-01',
            'content-type' => 'application/json',
        ])->post('https://api.anthropic.com/v1/messages', [
            'model' => 'claude-haiku-4-5-20251001',
            'max_tokens' => 1024,
            'system' => 'Sen bir kadın giyim mağazasının stil asistanısın. Müşterilere kıyafet kombinleri, beden seçimi ve moda önerileri konusunda yardım ediyorsun. Kısa ve samimi cevaplar ver. Türkçe konuş.',
            'messages' => [
                ['role' => 'user', 'content' => $request->message]
            ],
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Bir hata oluştu, tekrar dene.'], 500);
        }

        $data = $response->json();
        return response()->json([
            'reply' => $data['content'][0]['text']
        ]);
    }
}