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
        Schema::create('worker_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('worker_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'assigned', 'accepted', 'completed', 'canceled'])->default('pending');
            $table->text('operator_notes')->nullable();
            $table->dateTime('assigned_at')->nullable(); // تاریخ واگذاری
            $table->dateTime('delivered_at')->nullable(); // تاریخ تحویل
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_orders');
    }
};
