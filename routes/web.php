<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

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

Route::get('/', '\App\Http\Controllers\VoteController@index');
Route::post('/prepare', '\App\Http\Controllers\VoteController@prepare');
Route::get('/question/{question_id}', '\App\Http\Controllers\VoteController@question');
Route::post('/vote/{question_id}', '\App\Http\Controllers\VoteController@vote');
Route::get('/done', '\App\Http\Controllers\VoteController@done');
