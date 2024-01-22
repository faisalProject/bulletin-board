<?php

use App\Http\Controllers\LoginCT;
use App\Http\Controllers\RegisterCT;
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

Route::get('/', [LoginCT::class, 'index']);
Route::get('/register', [RegisterCT::class, 'index']);