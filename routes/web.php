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
Route::resource('favorites', \App\Http\Controllers\FavoriteController::class);
Route::get('characters/create/{buildId}', [\App\Http\Controllers\CharacterController::class, 'Create'])->name('characters.create');
Route::post('builds/search', [\App\Http\Controllers\BuildController::class, 'search'])->name('builds.search');
Route::post('builds/activate', [\App\Http\Controllers\BuildController::class, 'setActive'])->name('builds.setActive');

Route::resource('users', \App\Http\Controllers\UserController::class);
Route::post('admin/makeAdmin', [\App\Http\Controllers\UserController::class, 'makeAdmin'])->name('admin.makeAdmin');

Auth::routes();
Auth::routes(['verify'=>true]);
