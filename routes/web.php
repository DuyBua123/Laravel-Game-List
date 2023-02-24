<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/game-page', [GameController::class, 'showGamePage'])->name('game-page');
Route::get('/admin', [GameController::class, 'index'])->middleware('auth')->name('admin');


Route::controller(GameController::class)
    ->prefix('games')
    ->group(function() {
        Route::post('/games/post', 'store');
        Route::get('/games/get-one-game/{id}','getOneGame');
        Route::get('/games/get-latest-game', 'getLatestGame');
        Route::patch('/games/patch/{id}', 'update');
        Route::delete('games/delete/{id}', 'delete');
    })
    ->middleware('auth');