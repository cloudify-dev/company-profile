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
        Schema::table('about_us_page', function (Blueprint $table) {
            $table->boolean('is_activated')->default(false)->after('title_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us_page', function (Blueprint $table) {
            $table->dropColumn('is_activated');
        });
    }
};
