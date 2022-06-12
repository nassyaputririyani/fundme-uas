<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectsController as AdminProjectController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
    Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/forgot', [AuthController::class, 'forgotStore'])->name('forgot.store');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
Route::get('/projects/{id}', [ProjectController::class, 'detail'])->name('project.detail');
Route::post('/projects/{id}', [ProjectController::class, 'fundProject'])->name('project.fund-project');
Route::get('/projects/transaction/success', [ProjectController::class, 'showSuccessPage'])->name('project.fund-project.success');

// About us
Route::get('/about-us', [AboutController::class, 'index'])->name('about-us');

// Notification receive
Route::post('payments/receive-notification', [NotificationController::class, 'receivePayment']);

Route::prefix('/admin')->middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

    Route::get('/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/{id}/detail', [AdminProjectController::class, 'show'])->name('admin.projects.detail');
    Route::get('/projects/add', [AdminProjectController::class, 'add'])->name('admin.projects.add');
    Route::post('/projects/add', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/edit/{id}', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/edit/{id}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/delete/{id}', [AdminProjectController::class, 'destroy'])->name('admin.projects.delete');

    Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions.index');
    Route::put('/transactions/{id}', [AdminTransactionController::class, 'changeStatus'])->name('admin.transactions.update-status');
});