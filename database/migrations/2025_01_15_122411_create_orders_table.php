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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code', 25)->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->enum('status', ['pending', 'processing', 'completed', 'canceled'])->default('pending');
            $table->string('service_type');
            $table->json('service_options');
            $table->text('extra_details')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->string('total_amount')->nullable();
            $table->date('selected_date');
            $table->time('selected_time');
            $table->string('contact_number');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
