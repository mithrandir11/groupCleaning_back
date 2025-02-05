<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\Management\AdminController;
use App\Http\Controllers\Management\Auth\LoginController;
use App\Http\Controllers\Management\Finance\ManagePaymentController;
use App\Http\Controllers\Management\Finance\ManageReportController;
use App\Http\Controllers\Management\ManageArticleController;
use App\Http\Controllers\Management\ManageFinanceController;
use App\Http\Controllers\Management\ManageMenuController;
use App\Http\Controllers\Management\ManageMessageController;
use App\Http\Controllers\Management\ManageNotificationController;
use App\Http\Controllers\Management\ManageOrderController;
use App\Http\Controllers\Management\ManageResumeController;
use App\Http\Controllers\Management\ManageUserController;
use App\Http\Controllers\Management\ManageWorkerController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\Worker\WorkerController;
use App\Http\Controllers\Worker\WorkerFinancialController;
use App\Http\Controllers\Worker\WorkerMessageController;
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



Route::post('/upload-image', [ImageController::class, 'upload']);
Route::post('/upload-media', [MediaController::class, 'upload']);

Route::middleware(['auth'])->group(function () {


    //panel worker
    Route::middleware(['role:worker'])->group(function(){
        Route::get('/worker/dashboard', [WorkerController::class, 'dashboard'])->name('worker.dashboard');
        Route::get('/worker/info', [WorkerController::class, 'info'])->name('worker.info');
        Route::post('/worker/info/update', [WorkerController::class, 'update'])->name('worker.info.update');

        Route::get('/worker/orders', [WorkerOrderController::class, 'index'])->name('worker.orders');
        Route::get('/worker/orders/show/{worker_order}', [WorkerOrderController::class, 'show'])->name('worker.orders.show');
        Route::post('/worker/orders/{worker_order}/accept', [WorkerOrderController::class, 'acceptOrder'])->name('worker.orders.accept');
        Route::post('/worker/orders/{worker_order}/complete', [WorkerOrderController::class, 'completeOrder'])->name('worker.orders.complete');

        Route::get('/worker/financial', [WorkerFinancialController::class, 'index'])->name('worker.finance');
        Route::get('/worker/financial/details', [WorkerFinancialController::class, 'details'])->name('worker.finance.details');

        Route::get('/worker/messages', [WorkerMessageController::class, 'index'])->name('worker.messages');
        Route::post('/worker/messages/store', [WorkerMessageController::class, 'store'])->name('worker.messages.store');
    });
    

    // Route::post('/upload-image', [ImageController::class, 'upload']);
    

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


    Route::get('/admin/article-management', [ManageArticleController::class, 'index'])->name('admin.articles');
    Route::get('/admin/article-management/create', [ManageArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/article-management/store', [ManageArticleController::class, 'store'])->name('admin.articles.store');


    Route::get('/admin/menu-management', [ManageMenuController::class, 'index'])->name('admin.menu');
    Route::get('/admin/menu-management/create', [ManageMenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/admin/menu-management/store', [ManageMenuController::class, 'store'])->name('admin.menu.store');
    Route::delete('/admin/menu-management/delete/{menu}', [ManageMenuController::class, 'destroy'])->name('admin.menu.delete');
    Route::get('/admin/menu-management/edit/{menu}', [ManageMenuController::class, 'edit'])->name('admin.menu.edit');
    Route::PUT('/admin/menu-management/update/{menu}', [ManageMenuController::class, 'update'])->name('admin.menu.update');


    
    Route::get('/admin/message-management', [ManageMessageController::class, 'index'])->name('admin.messages');
    Route::get('/admin/message-management/show/{conversation}', [ManageMessageController::class, 'show'])->name('admin.messages.show');
    Route::post('/admin/message-management/store/{conversation}', [ManageMessageController::class, 'store'])->name('admin.messages.store');



    Route::get('/admin/notification-management', [ManageNotificationController::class, 'index'])->name('admin.notifications');
    Route::get('/admin/notification-management/show/send', [ManageNotificationController::class, 'showSend'])->name('admin.notifications.show.send');
    Route::post('/admin/notification-management/send', [ManageNotificationController::class, 'send'])->name('admin.notifications.send');



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
    Route::get('/admin/financial-management/pricing/show/{fee}', [ManageFinanceController::class, 'showPricing'])->name('admin.finance.pricing.show'); //قیمت گذاری نمایش
    Route::post('/admin/financial-management/pricing/applyPenalty/{fee}', [ManageFinanceController::class, 'applyPenalty'])->name('admin.finance.pricing.applyPenalty'); //قیمت گذاری نمایش

    Route::get('/admin/financial-management/payments', [ManagePaymentController::class, 'index'])->name('admin.finance.payments');
    Route::get('/admin/financial-management/payments/showWorkers', [ManagePaymentController::class, 'showWorkers'])->name('admin.finance.payments.showWorkers');
    Route::get('/admin/financial-management/payments/create/{worker}', [ManagePaymentController::class, 'create'])->name('admin.finance.payments.create');
    Route::get('/admin/financial-management/payments/edit/{payment}', [ManagePaymentController::class, 'edit'])->name('admin.finance.payments.edit');
    Route::post('/admin/financial-management/payments/store', [ManagePaymentController::class, 'store'])->name('admin.finance.payments.store');
    Route::post('/admin/financial-management/payments/update/{payment}', [ManagePaymentController::class, 'update'])->name('admin.finance.payments.update');

    Route::get('/admin/financial-management/reports', [ManageReportController::class, 'index'])->name('admin.finance.reports');
    Route::get('/admin/financial-management/reports/details/{worker}', [ManageReportController::class, 'details'])->name('admin.finance.reports.details');


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