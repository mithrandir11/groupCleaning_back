<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\Management\AdminController;
use App\Http\Controllers\Management\Auth\LoginController;
use App\Http\Controllers\Management\Finance\ManagePaymentController;
use App\Http\Controllers\Management\Finance\ManageReportController;
use App\Http\Controllers\Management\ManageArticleController;
use App\Http\Controllers\Management\ManageFAQController;
use App\Http\Controllers\Management\ManageFinanceController;
use App\Http\Controllers\Management\ManageFooterController;
use App\Http\Controllers\Management\ManageFooterSymbolController;
use App\Http\Controllers\Management\ManageMenuController;
use App\Http\Controllers\Management\ManageMessageController;
use App\Http\Controllers\Management\ManageNotificationController;
use App\Http\Controllers\Management\ManageOrderController;
use App\Http\Controllers\Management\ManageResumeController;
use App\Http\Controllers\Management\ManageServiceController;
use App\Http\Controllers\Management\ManageSuggestedPageController;
use App\Http\Controllers\Management\ManageTagController;
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

    Route::get('/admin/service-management', [ManageServiceController::class, 'index'])->name('admin.services');
    Route::get('/admin/service-management/create', [ManageServiceController::class, 'create'])->name('admin.services.create');
    // Route::post('/admin/service-management/store', [ManageServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/service-management/edit/{service}', [ManageServiceController::class, 'edit'])->name('admin.services.edit');
    // Route::PUT('/admin/service-management/update/{service}', [ManageServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/service-management/delete/{service}', [ManageServiceController::class, 'destroy'])->name('admin.services.delete');


    Route::get('/admin/article-management', [ManageArticleController::class, 'index'])->name('admin.articles');
    Route::get('/admin/article-management/create', [ManageArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/article-management/store', [ManageArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/admin/article-management/edit/{article}', [ManageArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::PUT('/admin/article-management/update/{article}', [ManageArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/admin/article-management/delete/{article}', [ManageArticleController::class, 'destroy'])->name('admin.articles.delete');


    Route::get('/admin/tag-management', [ManageTagController::class, 'index'])->name('admin.tags');
    Route::get('/admin/tag-management/create', [ManageTagController::class, 'create'])->name('admin.tags.create');
    Route::post('/admin/tag-management/store', [ManageTagController::class, 'store'])->name('admin.tags.store');
    Route::get('/admin/tag-management/edit/{tag}', [ManageTagController::class, 'edit'])->name('admin.tags.edit');
    Route::PUT('/admin/tag-management/update/{tag}', [ManageTagController::class, 'update'])->name('admin.tags.update');
    Route::delete('/admin/tag-management/delete/{tag}', [ManageTagController::class, 'destroy'])->name('admin.tags.delete');
    
    // Route::get('/admin/article-management/seo/{article}', [ManageArticleController::class, 'index'])->name('admin.articles');


    Route::get('/admin/faqs-management', [ManageFAQController::class, 'index'])->name('admin.faqs');
    Route::get('/admin/faqs-management/create', [ManageFAQController::class, 'create'])->name('admin.faqs.create');
    Route::post('/admin/faqs-management/store', [ManageFAQController::class, 'store'])->name('admin.faqs.store');
    Route::get('/admin/faqs-management/show/{menu}', [ManageFAQController::class, 'show'])->name('admin.faqs.show');
    Route::delete('/admin/faqs-management/delete/{faq}', [ManageFAQController::class, 'destroy'])->name('admin.faqs.delete');
    Route::get('/admin/faqs-management/edit/{faq}', [ManageFAQController::class, 'edit'])->name('admin.faqs.edit');
    Route::PUT('/admin/faqs-management/update/{faq}', [ManageFAQController::class, 'update'])->name('admin.faqs.update');
    
    Route::get('/admin/suggestedPage-management', [ManageSuggestedPageController::class, 'index'])->name('admin.suggestedPages');
    Route::get('/admin/suggestedPage-management/show/{menu}', [ManageSuggestedPageController::class, 'show'])->name('admin.suggestedPages.show');
    Route::get('/admin/suggestedPage-management/create', [ManageSuggestedPageController::class, 'create'])->name('admin.suggestedPages.create');
    Route::post('/admin/suggestedPage-management/store', [ManageSuggestedPageController::class, 'store'])->name('admin.suggestedPages.store');
    Route::delete('/admin/suggestedPage-management/delete/{suggested_page}', [ManageSuggestedPageController::class, 'destroy'])->name('admin.suggestedPages.delete');
    Route::get('/admin/suggestedPage-management/edit/{suggested_page}', [ManageSuggestedPageController::class, 'edit'])->name('admin.suggestedPages.edit');
    Route::PUT('/admin/suggestedPage-management/update/{suggested_page}', [ManageSuggestedPageController::class, 'update'])->name('admin.suggestedPages.update');


    Route::get('/admin/footer-management', [ManageFooterController::class, 'index'])->name('admin.footer');
    Route::get('/admin/footer-management/create', [ManageFooterController::class, 'create'])->name('admin.footer.create');
    Route::post('/admin/footer-management/store', [ManageFooterController::class, 'store'])->name('admin.footer.store');
    Route::delete('/admin/footer-management/delete/{footer}', [ManageFooterController::class, 'destroy'])->name('admin.footer.delete');
    Route::get('/admin/footer-management/edit/{footer}', [ManageFooterController::class, 'edit'])->name('admin.footer.edit');
    Route::PUT('/admin/footer-management/update/{footer}', [ManageFooterController::class, 'update'])->name('admin.footer.update');

    Route::get('/admin/footer-symbol-management/create', [ManageFooterSymbolController::class, 'create'])->name('admin.footerSymbol.create');
    Route::post('/admin/footer-symbol-management/store', [ManageFooterSymbolController::class, 'store'])->name('admin.footerSymbol.store');
    Route::delete('/admin/footer-symbol-management/delete/{symbol}', [ManageFooterSymbolController::class, 'destroy'])->name('admin.footerSymbol.delete');
    Route::get('/admin/footer-symbol-management/edit/{symbol}', [ManageFooterSymbolController::class, 'edit'])->name('admin.footerSymbol.edit');
    Route::PUT('/admin/footer-symbol-management/update/{symbol}', [ManageFooterSymbolController::class, 'update'])->name('admin.footerSymbol.update');



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
    Route::get('/admin/notification-management/create', [ManageNotificationController::class, 'create'])->name('admin.notifications.create');
    Route::post('/admin/notification-management/store', [ManageNotificationController::class, 'store'])->name('admin.notifications.store');
    Route::get('/admin/notification-management/edit/{notification}', [ManageNotificationController::class, 'edit'])->name('admin.notifications.edit');
    Route::PUT('/admin/notification-management/update/{notification}', [ManageNotificationController::class, 'update'])->name('admin.notifications.update');
    Route::delete('/admin/notification-management/delete/{notification}', [ManageNotificationController::class, 'destroy'])->name('admin.notifications.delete');



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

   
    Route::get('/admin/financial-management/pricing', [ManageFinanceController::class, 'index'])->name('admin.finance.pricing'); //قیمت گذاری
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