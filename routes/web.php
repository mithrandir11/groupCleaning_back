<?php

use App\Http\Controllers\Management\AdminController;
use App\Http\Controllers\Management\Auth\LoginController;
use App\Http\Controllers\Management\ManageFinanceController;
use App\Http\Controllers\Management\ManageOrderController;
use App\Http\Controllers\Management\ManageResumeController;
use App\Http\Controllers\Management\ManageUserController;
use App\Http\Controllers\Management\ManageWorkerController;
use App\Http\Controllers\Worker\WorkerController;
use App\Http\Controllers\Worker\WorkerFinancialController;
use App\Http\Controllers\Worker\WorkerOrderController;
use Illuminate\Support\Facades\Route;


Route::get('/login/admin', [LoginController::class, 'showLoginFormAdmin'])->name('login.admin');
Route::get('/login/worker', [LoginController::class, 'showLoginFormWorker'])->name('login.worker');
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login/admin', [LoginController::class, 'loginAdmin'])->name('login.admin');
Route::post('/login/worker', [LoginController::class, 'loginWorker'])->name('login.worker');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// رجیستر
// Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);


Route::middleware(['auth'])->group(function () {


    //panel worker
    Route::middleware(['role:worker'])->group(function(){
        Route::get('/worker/dashboard', [WorkerController::class, 'dashboard'])->name('worker.dashboard');

        Route::get('/worker/orders', [WorkerOrderController::class, 'index'])->name('worker.orders');
        Route::get('/worker/orders/show/{worker_order}', [WorkerOrderController::class, 'show'])->name('worker.orders.show');
        Route::post('/worker/orders/{worker_order}/accept', [WorkerOrderController::class, 'acceptOrder'])->name('worker.orders.accept');
        Route::post('/worker/orders/{worker_order}/complete', [WorkerOrderController::class, 'completeOrder'])->name('worker.orders.complete');

        Route::get('/worker/financial', [WorkerFinancialController::class, 'index'])->name('worker.finance');
    });
    




    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/order-management', [ManageOrderController::class, 'index'])->name('admin.orders');
    Route::get('/admin/order-management/show/{order}', [ManageOrderController::class, 'show'])->name('admin.orders.show');
    Route::get('/admin/order-management/show/{order}/assign-to-workers', [ManageOrderController::class, 'showAssignOrderToWorker'])->name('admin.orders.assignOrderToWorker.show');
    Route::post('/admin/order-management/show/{order}/assign-to-workers', [ManageOrderController::class, 'assignToWorkers'])->name('admin.orders.assignToWorkers');
    Route::post('/admin/order-management/{order}/accept', [ManageOrderController::class, 'acceptOrder'])->name('admin.orders.accept');
    Route::post('/admin/order-management/{order}/complete', [ManageOrderController::class, 'completeOrder'])->name('admin.orders.complete');
    Route::post('/admin/order-management/{order}/setPrice', [ManageOrderController::class, 'setOrderPrice'])->name('admin.orders.setPrice');
    // Route::post('/admin/order-management/findByOrderCode', [ManageOrderController::class, 'findOrderByOrderCode'])->name('admin.orders.findOrderByOrderCode');
    
    Route::get('/admin/user-management', [ManageUserController::class, 'index'])->name('admin.users');
    Route::get('/admin/user-management/edit/{user}', [ManageUserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/user-management/update/{user}', [ManageUserController::class, 'update'])->name('admin.users.update');

    Route::get('/admin/worker-management', [ManageWorkerController::class, 'index'])->name('admin.workers');

   
    Route::get('/admin/financial-management/pricing', [ManageFinanceController::class, 'indexPricing'])->name('admin.finance.pricing'); //قیمت گذاری

    Route::get('/admin/resume-management', [ManageResumeController::class, 'index'])->name('admin.resumes');
    Route::get('/admin/resume-management/show/{resume}', [ManageResumeController::class, 'show'])->name('admin.resumes.show');
    Route::put('/admin/resume-management/{resume}/update-commission', [ManageResumeController::class, 'updateCommission'])->name('admin.resumes.updateCommission');
    Route::post('/admin/resume-management/{resume}/approve', [ManageResumeController::class, 'approve'])->name('admin.resumes.approve');
    Route::post('/admin/resume-management/{resume}/reject', [ManageResumeController::class, 'reject'])->name('admin.resumes.reject');
    Route::delete('/admin/resume-management/{resume}', [ManageResumeController::class, 'destroy'])->name('admin.resumes.destroy');











    // Route::get('/admin/financial-management/payments', [ManageFinanceController::class, 'index'])->name('admin.users');
    // Route::get('/admin/financial-management/reports', [ManageFinanceController::class, 'index'])->name('admin.users');

    // Route::middleware(['role:admin'])->group(function () {
    //     Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    // });


    // Route::middleware(['role:admin,operator'])->group(function () {
    //     Route::get('/admin/posts', [AdminController::class, 'managePosts'])->name('admin.posts');
    // });
});