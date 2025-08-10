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
        Schema::table('project', function (Blueprint $table) {
            $table->string('duration')->nullable()->after('technologies');
            $table->string('budget_range')->nullable()->after('duration');
            $table->string('team_size')->nullable()->after('budget_range');
            $table->text('tags')->nullable()->after('team_size');
            $table->date('completion_date')->nullable()->after('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project', function (Blueprint $table) {
            $table->dropColumn([
                'duration',
                'budget_range', 
                'team_size',
                'tags',
                'completion_date'
            ]);
        });
    }
};
