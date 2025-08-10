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
            // Rename 'is_featured' to 'is_active'
            if (Schema::hasColumn('project', 'is_featured')) {
                $table->renameColumn('is_featured', 'is_active');
            }

            // Remove column status if it exists
            if (Schema::hasColumn('project', 'status')) {
                $table->dropColumn('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project', function (Blueprint $table) {
            // Rollback
            if (Schema::hasColumn('project', 'is_active')) {
                $table->renameColumn('is_active', 'is_featured');
            }

            // Add 'status' column back if it was removed
            if (!Schema::hasColumn('project', 'status')) {
                $table->enum('status', ['active', 'inactive', 'draft'])->default('active')->after('is_featured');
            }
        });
    }
};
