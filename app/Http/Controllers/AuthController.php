<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        // dd($providerUser->avatar);

        // Normaliza o URL do avatar - as vezes a API do Google retorna a URL com adicionais,
        // dai não renderiza a imagem, caso acontecer, usar:
        // $avatarUrl = $providerUser->avatar 
        // ? preg_replace('/\?sz=\d+|=s\d+-c/', '', $providerUser->avatar) 
        // : null;

        // Explicação do porque usar o preg_replace:
        // O Google usa parâmetros como s96-c nos URLs de avatar para definir tamanho e estilo da imagem, mas 
        // eles podem causar problemas de compatibilidade em alguns contextos. A solução foi remover esses 
        // parâmetros usando preg_replace, transformando o link em um URL direto e funcional.

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
        // return response()->json(auth()->user());
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Verificar se o e-mail existe
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Este e-mail não está cadastrado no sistema.'])
            ->withInput();
        }
    
        // Verificar credenciais
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
    
        return redirect()->back()->withErrors(['password' => 'E-mail ou senha incorretos.'])
        ->withInput(); // Mantém os dados no Mooodal
    }
    
}
