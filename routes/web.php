<?php

use App\Http\Controllers\Admin\CategoryCT;
use App\Http\Controllers\Admin\CommentCT as AdminCommentCT;
use App\Http\Controllers\Admin\DashboardCT;
use App\Http\Controllers\Admin\NewsCT;
use App\Http\Controllers\Admin\ReplyCT;
use App\Http\Controllers\Admin\UsersCT;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\AboutCT;
use App\Http\Controllers\User\CategoryCT as UserCategoryCT;
use App\Http\Controllers\User\CommentCT;
use App\Http\Controllers\User\ContactCT;
use App\Http\Controllers\User\DashboardCT as UserDashboardCT;
use App\Http\Controllers\User\MessageCT;
use App\Http\Controllers\User\NewsCT as UserNewsCT;
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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['admin', 'auth'])->prefix('admin')->group(function() {
    // CRUD dashboard
    Route::get('dashboard/index', [DashboardCT::class, 'index'])->name('dashboard_admin');
    Route::get('dashboard/detail/{id}', [DashboardCT::class, 'show'])->name('dashboard_admin_detail');

    // CRUD news
    Route::get('news/index', [NewsCT::class, 'index'])->name('news_admin');
    Route::get('news/create', [NewsCT::class, 'create'])->name('news_admin_create');
    Route::post('news/index', [NewsCT::class, 'store'])->name('news_admin_store');
    Route::get('news/edit/{id}', [NewsCT::class, 'edit'])->name('news_admin_edit');
    Route::put('news/index/{id}', [NewsCT::class, 'update'])->name('news_admin_update');
    Route::delete('news/index/{id}', [NewsCT::class, 'destroy'])->name('news_admin_destroy');

    // CRUD user
    Route::get('user/index', [UsersCT::class, 'index'])->name('users_admin');

    // CRUD category
    Route::get('category/index', [CategoryCT::class, 'index'])->name('category_admin');
    Route::post('category/index', [CategoryCT::class, 'store'])->name('category_admin_store');
    Route::put('category/index/{id}', [CategoryCT::class, 'update'])->name('category_admin_update');
    Route::delete('category/index/{id}', [CategoryCT::class, 'destroy'])->name('category_admin_destroy');

    // CRUD comments
    Route::get('comments/index', [AdminCommentCT::class, 'index'])->name('comment_admin_index');

    // CRUD contact
    Route::get('contact/index', [ReplyCT::class, 'index'])->name('contact_admin_index');
    Route::post('contact/index/{id}', [ReplyCT::class, 'store'])->name('contact_admin_store');
});

// User
Route::middleware(['user', 'auth'])->group(function() {
    // CRUD news
    Route::get('news/index', [UserNewsCT::class, 'index'])->name('news_user_index');
    Route::get('dashboard/index', [UserDashboardCT::class, 'index'])->name('dashboard_user');
    Route::get('news/detail/{id}', [UserNewsCT::class, 'show'])->name('news_detail');
    Route::post('news/detail/{id}', [CommentCT::class, 'store'])->name('comment_store');

    // CRUD contact
    Route::get('contact/index', [MessageCT::class, 'index'])->name('contact_user_index');
    Route::post('contact/index', [MessageCT::class, 'store'])->name('contact_user_store');

    // CRUD about
    Route::get('about/index', [AboutCT::class, 'index'])->name('about_user_index');

    // CRUD category
    Route::get('category/index/{category_name}', [UserCategoryCT::class, 'index'])->name('category_user_index');

});