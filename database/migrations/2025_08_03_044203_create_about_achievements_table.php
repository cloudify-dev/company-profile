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
        Schema::create('about_achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_id')->constrained('about_us_page')->onDelete('cascade');
            $table->string('achievement_value', 125);
            $table->string('achievement_unit', 125);
            $table->string('achievement_description', 125);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['about_id', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_achievements');
    }
};
