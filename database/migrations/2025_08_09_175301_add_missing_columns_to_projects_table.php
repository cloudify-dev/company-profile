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
        Schema::table('projects', function (Blueprint $table) {
            // Brochure files
            $table->string('brochure_pdf')->nullable()->after('result_images');
            $table->string('brochure_doc')->nullable()->after('brochure_pdf');
            
            // Help banner image
            $table->string('help_banner_image')->nullable()->after('brochure_doc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['brochure_pdf', 'brochure_doc', 'help_banner_image']);
        });
    }
};
