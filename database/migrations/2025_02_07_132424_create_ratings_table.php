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
            $table->foreignId('worker_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade'); 
            $table->tinyInteger('rating')->nullable(); 
            $table->text('comment')->nullable(); 
            $table->timestamps();
        

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
