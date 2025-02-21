<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

// Routes pour les objets perdus ou trouvés (protégées par auth)
Route::middleware(['auth'])->group(function () {
    Route::resource('items', ItemController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('items.comments', CommentController::class)->shallow();
});

// Page d'accueil
Route::get('/', function () {
    return view('home');
});

// Dashboard (accessible uniquement après connexion)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Gestion du profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes d'authentification (générées par Laravel Breeze/Jetstream)
require __DIR__.'/auth.php';

