<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [GuestController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/entries/create', [EntryController::class, 'create']);
Route::post('/entries', [EntryController::class, 'store']);

Route::get('/entries/{entry}', [GuestController::class, 'show']);
Route::get('/entries/{entry}/edit', [EntryController::class, 'edit']);

Route::put('/entries/{entry}', [EntryController::class, 'update']);
Route::get('/users/{user}', [UserController::class, 'show']);
