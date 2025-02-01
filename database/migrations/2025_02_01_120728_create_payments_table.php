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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_id')->constrained('users')->onDelete('cascade'); // نیروی کار
            $table->string('amount'); // مبلغ (با ۲ رقم اعشار)
            $table->string('tracking_code')->unique(); // کدپیگیری منحصر به فرد
            $table->date('payment_date'); // تاریخ پرداخت
            $table->text('description')->nullable(); // توضیحات
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
