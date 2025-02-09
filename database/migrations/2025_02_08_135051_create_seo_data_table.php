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
        Schema::create('seo_data', function (Blueprint $table) {
            $table->id();
            $table->morphs('seotable'); // Relation polymorphic برای اتصال به مدل‌های مختلف
            $table->string('title')->nullable(); // عنوان صفحه
            $table->text('description')->nullable(); // توضیحات Meta
            $table->text('keywords')->nullable(); // کلمات کلیدی
            $table->string('canonical_url')->nullable(); // URL کانونیکال
            $table->json('open_graph')->nullable(); // تنظیمات Open Graph (به صورت JSON)
            $table->json('json_ld')->nullable(); // تنظیمات JSON-LD (به صورت JSON)
            $table->timestamps();
        
            // Indexing برای بهینه‌سازی
            $table->index(['seotable_id', 'seotable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_data');
    }
};
