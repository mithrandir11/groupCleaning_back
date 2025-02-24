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
            $table->morphs('seotable'); 
            $table->string('title')->nullable(); 
            $table->text('description')->nullable(); 
            $table->text('keywords')->nullable(); 
            $table->string('canonical_url')->nullable(); 
            $table->json('open_graph')->nullable(); 
            $table->json('json_ld')->nullable(); 
            $table->timestamps();
        
           
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
