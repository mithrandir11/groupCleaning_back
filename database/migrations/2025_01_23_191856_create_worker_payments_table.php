<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('worker_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_id')->constrained('users')->onDelete('cascade'); // نیروی کار
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // سفارش
            $table->dateTime('payment_date')->nullable(); // تاریخ پرداخت
            $table->string('amount'); // مبلغ دستمزد
            $table->text('description')->nullable(); // توضیحات پرداخت
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_payments');
    }
};
