<?php

use App\Http\Controllers\EscalacaoController;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\TimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * => Rotas de controle de Jogadores
 */
Route::get('jogadores', [JogadorController::class, 'index']);
Route::get('jogador/{id}', [JogadorController::class, 'show']);
Route::post('jogador', [JogadorController::class, 'store']);
Route::put('jogador/{id}', [JogadorController::class, 'update']);
Route::delete('jogador/{id}', [JogadorController::class, 'destroy']);
/********************************************************************************/


/**
 * => Rotas de controle de Times
 */
Route::get('times', [TimeController::class, 'index']);
Route::get('time/jogadores', [TimeController::class, 'jogadores']);
Route::post('time', [TimeController::class, 'store']);
Route::put('time/{id}', [TimeController::class, 'update']);
Route::delete('times/{id}', [TimeController::class, 'destroy']);
/********************************************************************************/


/**
 * => Rotas de controle de Partidas
 */
Route::get('partidas', [PartidaController::class, 'partidasEscalacoes']);
Route::post('partida', [PartidaController::class, 'store']);
Route::put('partida/{id}', [PartidaController::class, 'update']);
Route::delete('partida/{id}', [PartidaController::class, 'destroy']);

/********************************************************************************/


/**
 * => Rotas de relatórios de Partidas e Jogadores
 */
Route::get('partidas/escalacoes', [PartidaController::class, 'partidasEscalacoes']);
Route::get('escalacoes', [EscalacaoController::class, 'index']);

/********************************************************************************/
