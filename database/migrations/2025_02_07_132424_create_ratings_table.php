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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('worker_id')->constrained('users')->onDelete('cascade'); // نیروی کار
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // سفارش
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade'); // مشتری
            $table->tinyInteger('rating')->nullable(); // امتیاز (0-5)
            $table->text('comment')->nullable(); // نظر اختیاری
            $table->timestamps();
        
            // Indexing برای بهینه‌سازی
            $table->index('worker_id');
            $table->index('order_id');
            $table->index('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
