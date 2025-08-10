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
        Schema::create('blog_page', function (Blueprint $table) {
            $table->id();
            // Breadcrumb Section
            $table->string('breadcrumb_title')->default('Blog Post');
            $table->string('breadcrumb_image')->nullable();

            $table->timestamps();
            // Settings
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_page');
    }
};
