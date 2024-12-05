<?php

use App\Http\Controllers\CafeController;
use App\Http\Controllers\CoquetelController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');


// Categorias
Route::get('/cafes', [CafeController::class, 'index'])->name('cafes');
Route::get('/coqueteis', [CoquetelController::class, 'index'])->name('coqueteis');

Route::get('/vitaminas', function () {
    return view('vitaminas');  
})->name('vitaminas');

// Autenticação com Socialite 
Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
Route::get('/logged', [AuthController::class, 'logged']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Cadastro manual
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
});