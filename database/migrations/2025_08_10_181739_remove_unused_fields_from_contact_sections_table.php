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
        Schema::table('contact_sections', function (Blueprint $table) {
            $table->dropColumn(['subtitle', 'title_black', 'title_blue', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_sections', function (Blueprint $table) {
            $table->string('subtitle')->default('APPOINTMENT NOW');
            $table->string('title_black')->default('We Are Ready to Talk About Your');
            $table->string('title_blue')->default('Opportunities');
            $table->text('description');
        });
    }
};
