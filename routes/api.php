<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ReviewController;

Route::prefix('livros')->group(function () {
    Route::get('/', [LivroController::class, 'listarLivrosComReviewsAutorGenero']); 
    Route::post('/', [LivroController::class, 'store']); 
    Route::get('/{livro}', [LivroController::class, 'show']); 
    Route::put('/{livro}', [LivroController::class, 'update']); 
    Route::delete('/{livro}', [LivroController::class, 'deletar']); 
    Route::get('/{livro}/reviews', [LivroController::class, 'listarReviews']); 
});

Route::prefix('autores')->group(function () {
    Route::get('/', [AutorController::class, 'listarAutoresComLivros']); 
    Route::post('/', [AutorController::class, 'store']); 
    Route::get('/{autor}', [AutorController::class, 'show']); 
    Route::put('/{autor}', [AutorController::class, 'update']);
    Route::delete('/{autor}', [AutorController::class, 'destroy']); 
    Route::get('/{autor}/livros', [AutorController::class, 'listarLivros']); 
});


Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index']); 
    Route::post('/', [UsuarioController::class, 'store']);
    Route::get('/{usuario}', [UsuarioController::class, 'show']); 
    Route::put('/{usuario}', [UsuarioController::class, 'update']); 
    Route::delete('/{usuario}', [UsuarioController::class, 'deletar']); 
    Route::get('/{usuario}/reviews', [UsuarioController::class, 'listarReviews']); 
});

Route::prefix('generos')->group(function () {
    Route::get('/', [GeneroController::class, 'listarGenerosComLivros']); 
    Route::post('/', [GeneroController::class, 'store']);
    Route::get('/{genero}', [GeneroController::class, 'show']); 
    Route::put('/{genero}', [GeneroController::class, 'update']); 
    Route::delete('/{genero}', [GeneroController::class, 'deletar']); 
    Route::get('/{genero}/livros', [GeneroController::class, 'listarLivros']); 
});

Route::prefix('reviews')->group(function () {
    Route::get('/', [ReviewController::class, 'index']); 
    Route::post('/', [ReviewController::class, 'store']); 
    Route::get('/{id}', [ReviewController::class, 'show']); 
    Route::put('/{id}', [ReviewController::class, 'update']); 
    Route::delete('/{id}', [ReviewController::class, 'destroy']); 
});
