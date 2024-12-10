<?php

use App\Http\Controllers\CafeController;
use App\Http\Controllers\CoquetelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/sobre-nos', function () {
    return view('sobre-nos');
})->name('sobre-nos');

Route::get('/contato', function () {
    return view('contatos');
})->name('contatos');

// Autenticação com Socialite 
Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
Route::get('/logged', [AuthController::class, 'logged']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cadastro manual
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    // Usuário
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
    // Categorias
    Route::get('/cafes', [CafeController::class, 'index'])->name('cafes');
    Route::get('/coqueteis', [CoquetelController::class, 'index'])->name('coqueteis');
});