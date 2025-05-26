<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ReviewController;

Route::prefix('livros')->group(function () {
    Route::get('/{livro}/reviews', [LivroController::class, 'listarReviews']);
    Route::get('/', [LivroController::class, 'listarLivrosComReviewsAutorGenero']);
    Route::delete('/{livro}', [LivroController::class, 'deletar']);
});

Route::prefix('autores')->group(function () {
    Route::get('/{autor}/livros', [AutorController::class, 'listarLivros']);
    Route::get('/', [AutorController::class, 'listarAutoresComLivros']);
    Route::delete('/{autor}', [AutorController::class, 'deletar']);
});

Route::prefix('usuarios')->group(function () {
    Route::get('/{usuario}/reviews', [UsuarioController::class, 'listarReviews']);
    Route::delete('/{usuario}', [UsuarioController::class, 'deletar']);
});

Route::prefix('generos')->group(function () {
    Route::get('/{genero}/livros', [GeneroController::class, 'listarLivros']);
    Route::get('/', [GeneroController::class, 'listarGenerosComLivros']);
    Route::delete('/{genero}', [GeneroController::class, 'deletar']);
});

Route::prefix('reviews')->group(function () {
    Route::post('/', [ReviewController::class, 'criar']);
    Route::delete('/{review}', [ReviewController::class, 'deletar']);
});


Route::prefix('reviews')->group(function () {
    Route::get('/', 'App\Http\Controllers\ReviewController@index');         
    Route::post('/', 'App\Http\Controllers\ReviewController@store');        
    Route::get('{id}', 'App\Http\Controllers\ReviewController@show');       
    Route::put('{id}', 'App\Http\Controllers\ReviewController@update');     
    Route::delete('{id}', 'App\Http\Controllers\ReviewController@destroy'); 
});
