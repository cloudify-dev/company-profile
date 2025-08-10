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
        Schema::create('blog_quotes', function (Blueprint $table) {
            $table->id('quote_id');
            $table->foreignId('blog_id')->constrained('blogs', 'blog_id')->onDelete('cascade');
            $table->string('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_quotes');
    }
};
