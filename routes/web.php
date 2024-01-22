<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'loginCreate'])->name('login_index');
Route::get('/register', [AuthController::class, 'registerCreate'])->name('register_index');
Route::post('/', [AuthController::class, 'registerStore'])->name('register_store');