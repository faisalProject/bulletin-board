<?php

use App\Http\Controllers\Admin\DashboardCT;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\DashboardCT as UserDashboardCT;
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
Route::post('/login', [AuthController::class, 'loginStore'])->name('login_store');
Route::get('/register', [AuthController::class, 'registerCreate'])->name('register_index');
Route::post('/', [AuthController::class, 'registerStore'])->name('register_store');

// Admin
Route::middleware(['admin', 'auth'])->prefix('admin')->group(function() {
    Route::get('dashboard', [DashboardCT::class, 'index'])->name('dashboard_admin');
});

// User
Route::middleware(['user', 'auth'])->group(function() {
    Route::get('dashboard', [UserDashboardCT::class, 'index'])->name('dashboard_user');
});