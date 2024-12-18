<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/vote', [\App\Http\Controllers\VoteController::class, 'vote'])->name('vote');
Route::get('/getvote', [\App\Http\Controllers\VoteController::class, 'getVote'])->name('getVote');
