<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Método para redirecionar para a página de login do provider
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Método para capturar o callback após o login no provider
    public function handleProviderCallback(string $provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        // Verifica se o usuário já existe pelo e-mail, senão cria um novo
        $user = User::updateOrCreate([
            'email' => $providerUser->email,
        ], [
            'provider_id' => $providerUser->id,
            'name' => $providerUser->name,
            'provider_avatar' => $providerUser->avatar,
            'provider_name' => $provider,
        ]);

        // Realiza o login do usuário
        Auth::login($user);
        return redirect('/logged');
    }

    // Método para verificar se o usuário está logado
    public function logged()
    {
        return response()->json(auth()->user());
    }
}
