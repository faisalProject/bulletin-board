<?php

use App\Http\Controllers\Admin\CategoryCT;
use App\Http\Controllers\Admin\DashboardCT;
use App\Http\Controllers\Admin\NewsCT;
use App\Http\Controllers\Admin\UsersCT;
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
    Route::get('dashboard/index', [DashboardCT::class, 'index'])->name('dashboard_admin');

    // CRUD news
    Route::get('news/index', [NewsCT::class, 'index'])->name('news_admin');

    // CRUD user
    Route::get('user/index', [UsersCT::class, 'index'])->name('users_admin');

    // CRUD category
    Route::get('category/index', [CategoryCT::class, 'index'])->name('category_admin');
    Route::post('category/index', [CategoryCT::class, 'store'])->name('category_admin_store');
    Route::put('category/index/{id}', [CategoryCT::class, 'update'])->name('category_admin_update');
    Route::delete('category/index/{id}', [CategoryCT::class, 'destroy'])->name('category_admin_destroy');
});

// User
Route::middleware(['user', 'auth'])->group(function() {
    Route::get('dashboard/index', [UserDashboardCT::class, 'index'])->name('dashboard_user');
});