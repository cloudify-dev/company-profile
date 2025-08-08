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
            $table->boolean('is_featured')->default(false)->after('image');
            $table->enum('status', ['active', 'inactive', 'draft'])->default('active')->after('is_featured');
            $table->string('client_name')->nullable()->after('status');
            $table->string('project_url')->nullable()->after('client_name');
            $table->json('technologies')->nullable()->after('project_url');
            $table->integer('sort_order')->default(0)->after('technologies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project', function (Blueprint $table) {
            $table->dropColumn([
                'is_featured',
                'status', 
                'client_name',
                'project_url',
                'technologies',
                'sort_order'
            ]);
        });
    }
};
