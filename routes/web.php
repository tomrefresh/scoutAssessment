<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('users');

#User routes
Route::post('/user-create', [UserController::class, 'create'])->name('user_create');
Route::post('/user-update', [UserController::class, 'update'])->name('user_update');
Route::get('/user-edit', [UserController::class, 'edit'])->name('user_edit');
Route::get('/user-destroy', [UserController::class, 'destroy'])->name('user_destroy');
