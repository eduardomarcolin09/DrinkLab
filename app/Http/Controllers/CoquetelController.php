<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CoquetelController extends Controller
{
    public function index()
    {
        // URL da API TheCocktailDB
        $url = 'https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=Cocktail';

        $response = Http::get($url);

        // Verifica se deu certo
        if ($response->failed()) {
            return response()->json(['error' => 'Falha ao buscar dados de coquetéis'], 500);
        }

        $coqueteis = collect($response->json()['drinks'])->take(12); // Limita a 12 itens
        return view('coqueteis', ['coqueteis' => $coqueteis]);
    }
}

