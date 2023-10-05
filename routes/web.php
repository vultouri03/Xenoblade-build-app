<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'Index'])->name('home')->middleware("verified");
Route::get('/mybuilds', [\App\Http\Controllers\BuildController::class, 'myIndex'])->name('mybuilds');

Route::resource('builds', \App\Http\Controllers\BuildController::class,);
Route::resource('characters', \App\Http\Controllers\CharacterController::class,)->except('create');
Route::get('characters/create/{buildId}', [\App\Http\Controllers\CharacterController::class, 'Create'])->name('characters.create');

Auth::routes();
Auth::routes(['verify'=>true]);
