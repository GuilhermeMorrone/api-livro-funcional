<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsuarioController;


Route::get('/livro', [LivroController::class, 'index']);
Route::get('/livro/{id}', [LivroController::class, 'show']);
Route::post('/livro', [LivroController::class, 'store']);
Route::put('/livro/{id}', [LivroController::class, 'update']);
Route::delete('/livro/{id}', [LivroController::class, 'destroy']);


Route::get('/autor', [AutorController::class, 'index']);
Route::get('/autor/{id}', [AutorController::class, 'show']);
Route::post('/autor', [AutorController::class, 'store']);
Route::put('/autor/{id}', [AutorController::class, 'update']);
Route::delete('/autor/{id}', [AutorController::class, 'destroy']);


Route::get('/usuario', [UsuarioController::class, 'index']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::put('/usuario/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);


Route::get('/genero', [GeneroController::class, 'index']);
Route::get('/genero/{id}', [GeneroController::class, 'show']);
Route::post('/genero', [GeneroController::class, 'store']);
Route::put('/genero/{id}', [GeneroController::class, 'update']);
Route::delete('/genero/{id}', [GeneroController::class, 'destroy']);


Route::get('/review', [ReviewController::class, 'index']);
Route::get('/review/{id}', [ReviewController::class, 'show']);
Route::post('/review', [ReviewController::class, 'store']);
Route::put('/review/{id}', [ReviewController::class, 'update']);
Route::delete('/review/{id}', [ReviewController::class, 'destroy']);
