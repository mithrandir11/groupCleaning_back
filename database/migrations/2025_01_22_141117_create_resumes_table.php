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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('father_name');
            $table->string('national_code')->unique();
            $table->string('phone');
            $table->string('bank_name');
            $table->string('sheba_number');
            $table->text('address');
            $table->string('cooperation_with_other_company')->nullable();
            $table->string('personal_image')->nullable();
            $table->string('national_card_image')->nullable();
            $table->string('residence_document_image')->nullable();
            $table->text('work_experience')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->decimal('commission_rate', 5, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
