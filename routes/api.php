<?php

use App\Http\Controllers\SuperHeroiController;
use App\Http\Controllers\VilaoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/superherois', [SuperHeroiController::class, 'exibirSuperHerois']);
Route::get('/superherois/{id}', [SuperHeroiController::class, 'buscarSuperHeroiPorId']);
Route::post('/superherois', [SuperHeroiController::class, 'criarSuperHeroi']);
Route::put('/superherois/{id}', [SuperHeroiController::class, 'editarSuperHeroi']);
Route::delete('/superherois/{id}', [SuperHeroiController::class, 'deletarSuperHeroi']);


Route::get('/viloes', [VilaoController::class, 'exibirViloes']);
Route::get('/viloes/{id}', [VilaoController::class, 'buscarVilaoPorId']);
Route::post('/viloes', [VilaoController::class, 'criarVilao']);
Route::put('/viloes/{id}', [VilaoController::class, 'editarVilao']);
Route::delete('/viloes/{id}', [VilaoController::class, 'deletarVilao']);