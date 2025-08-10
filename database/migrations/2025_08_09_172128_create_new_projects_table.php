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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('client')->nullable();
            $table->string('location')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('image')->nullable();
            
            // Challenge section
            $table->text('challenges')->nullable();
            $table->string('challenge_image')->nullable();
            $table->json('challenge_points')->nullable(); // Dynamic challenge points
            
            // Results section
            $table->text('results')->nullable();
            $table->json('result_images')->nullable(); // Dynamic result images
            
            // Status fields
            $table->boolean('is_active')->default(true);
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
