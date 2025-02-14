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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('order_id')->nullable()->constrained()->onDelete('set null');
            // $table->foreignId('worker_id')->nullable()->constrained('users')->onDelete('set null'); // افزودن نیروی کار
            // $table->string('settled_amount')->default(0);// مبلغ تسویه شده
            // $table->string('income_amount');// مبلغ درآمد (حق‌الزحمه)
            // $table->string('credit_amount')->nullable();// مبلغ بستانکاری
            // $table->text('description')->nullable();
            $table->foreignId('worker_id')->constrained('users')->onDelete('cascade'); // افزودن نیروی کار
            $table->string('total_paid_amount')->default(0);// مبلغ تسویه شده
            $table->string('total_income_amount')->default(0);// مبلغ درآمد (حق‌الزحمه)
            $table->string('total_credit_amount')->default(0);// مبلغ بستانکاری
            // $table->enum('status', ['debtor', 'creditor', 'balanced'])->default('balanced');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
