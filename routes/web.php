<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});


// Para me autenticar, vai abrir a janela de autenticação na 1º VEZ
// Da segunda em diante autentica direto e redireciona

Route::get('/auth/{provider}/redirect', function (string $provider) {
    return Socialite::driver($provider)->redirect();
});
 
Route::get('/auth/{provider}/callback', function (string $provider) {
    $providerUser = Socialite::driver($provider)->user();
 
    // Se eu for trabalhar com um só provider, até faz sentido eu colocar só o id no updateOrCreate
    // mas como não, coloca-se o email
    $user = User::updateOrCreate([
        'email' => $providerUser->email,
    ], [
        'provider_id' => $providerUser->id,
        'name' => $providerUser->name,
        'provider_avatar' => $providerUser->avatar,
        'provider_name' => $provider,
    ]);
 
    Auth::login($user);

    return redirect('/logged');
});

// Verificar se deu certo
Route::get('/logged', function () {
    echo('<pre>');
    var_dump(auth()->user());
});
