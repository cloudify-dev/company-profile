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
        Schema::table('teams', function (Blueprint $table) {
            // Basic info fields
            $table->string('experience')->nullable()->after('availability'); // e.g., "More Than 10 Years"
            
            // Biography section
            $table->text('personal_biography')->nullable()->after('experience');
            $table->text('professional_skills_description')->nullable()->after('personal_biography');
            
            // Skills (JSON field to store skills with percentages)
            $table->json('skills')->nullable()->after('professional_skills_description');
            
            // Activities section
            $table->text('activities_description')->nullable()->after('skills');
            $table->json('activities_list')->nullable()->after('activities_description');
            
            // Educational qualification
            $table->text('educational_qualification')->nullable()->after('activities_list');
            $table->json('experience_timeline')->nullable()->after('educational_qualification'); // Work experience history
            
            // Company field (jika belum ada)
            if (!Schema::hasColumn('teams', 'company')) {
                $table->string('company')->nullable()->after('experience_timeline');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn([
                'experience',
                'personal_biography',
                'professional_skills_description',
                'skills',
                'activities_description',
                'activities_list',
                'educational_qualification',
                'experience_timeline'
            ]);
            
            // Drop company field hanya jika kita yang menambahkannya
            if (Schema::hasColumn('teams', 'company')) {
                $table->dropColumn('company');
            }
        });
    }
};
