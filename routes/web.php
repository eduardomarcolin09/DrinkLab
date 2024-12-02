<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cafes', function () {
    return view('cafes');  
})->name('cafes');

Route::get('/coqueteis', function () {
    return view('coqueteis'); 
})->name('coqueteis');

Route::get('/vitaminas', function () {
    return view('vitaminas');  
})->name('vitaminas');


Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
Route::get('/logged', [AuthController::class, 'logged']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
