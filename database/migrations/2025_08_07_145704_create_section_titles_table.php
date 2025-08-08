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
        Schema::create('section_titles', function (Blueprint $table) {
            $table->id();
            $table->string('section_name')->unique(); // team, testimonial, service, etc.
            $table->string('subtitle'); // e.g., "TEAM MEMBER", "CUSTOMER FEEDBACK"
            $table->string('title_black'); // e.g., "See Our Skilled Expert", "What Happy Clients Says"
            $table->string('title_blue'); // e.g., "Team", "About Us?"
            $table->text('description')->nullable(); // Optional description
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_titles');
    }
};
