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
        Schema::create('worker_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // سفارش
            $table->foreignId('worker_id')->constrained('users')->onDelete('cascade'); // نیروی کار
            $table->string('amount'); // مبلغ حق‌الزحمه
            $table->string('penalty_amount')->nullable(); // مبلغ جریمه
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_fees');
    }
};
