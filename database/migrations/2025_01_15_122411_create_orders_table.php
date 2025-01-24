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
            $table->foreignId('worker_id')->nullable()->constrained('users')->onDelete('set null'); // نیروی کار
            $table->enum('status', ['pending', 'assigned', 'accepted', 'completed', 'finalized', 'canceled'])->default('pending');
            // $table->enum('status', ['pending', 'completed', 'cancelled', 'processing'])->default('pending');
            $table->string('service_type');
            $table->json('service_options');
            $table->text('extra_details')->nullable();
            $table->text('operator_notes')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->string('total_amount')->nullable();
            $table->date('selected_date');
            $table->time('selected_time');
            $table->string('contact_number');
            $table->text('address'); // ذخیره کامل آدرس
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
