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
        Schema::create('about_us_page', function (Blueprint $table) {
            $table->id();
            $table->string('circle_title');
            $table->string('circle_subtitle');
            $table->string('title_black');
            $table->string('title_blue');
            $table->text('title_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_page');
    }
};
