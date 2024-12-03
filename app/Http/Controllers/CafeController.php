<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CafeController extends Controller
{
    public function index()
    {
        // URL da API de Cafés 
        $url = 'https://api.sampleapis.com/coffee/hot'; 

        // Fazendo a requisição
        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Falha ao buscar dados de cafés'], 500);
        }

        // Coleta as receitas de café
        $cafes = collect($response->json())->take(12);
        return view('cafes', ['cafes' => $cafes]);
    }
}
