<?php

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
    return redirect('bingo');
});
Auth::routes();

Route::livewire('bingo')->middleware('auth')->layout('layouts.livewire')->name('bingo');

Route::livewire('gamemaster', 'game-master')->middleware(\App\Http\Middleware\GameMaster::class)->layout('layouts.livewire');
Route::livewire('gamemaster-card/{card}', 'game-master-card')
    ->middleware(\App\Http\Middleware\GameMaster::class)
    ->layout('layouts.livewire')
    ->name('gamemaster-card');

Route::livewire('gamemaster/invites', 'invites')
    ->middleware(\App\Http\Middleware\GameMaster::class)
    ->layout('layouts.livewire')
    ->name('gamemaster-invites');
