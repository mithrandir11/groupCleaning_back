<?php

use App\Http\Controllers\Management\AdminController;
use App\Http\Controllers\Management\Auth\LoginController;
use App\Http\Controllers\Management\ManageUserController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// رجیستر
// Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/order-management', [AdminController::class, 'manageOrders'])->name('admin.orders');
    Route::post('/admin/order-management/findByOrderCode', [AdminController::class, 'findOrderByOrderCode'])->name('admin.orders.findOrderByOrderCode');

    
    Route::get('/admin/user-management', [ManageUserController::class, 'index'])->name('admin.users');
    Route::get('/admin/user-management/edit/{user}', [ManageUserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/user-management/update/{user}', [ManageUserController::class, 'update'])->name('admin.users.update');

    // Route::middleware(['role:admin'])->group(function () {
    //     Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    // });


    // Route::middleware(['role:admin,operator'])->group(function () {
    //     Route::get('/admin/posts', [AdminController::class, 'managePosts'])->name('admin.posts');
    // });
});