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
        // Schema::create('tags', function (Blueprint $table) {
        //     $table->id('tag_id');
        //     $table->string('text');
        //     $table->timestamps();
        // });
        Schema::create('blog_tags', function (Blueprint $table) {
            // $table->foreignId('tag_id')
            //     ->constrained('tags', 'tag_id')
            //     ->onDelete('cascade');
            $table->id('tag_id');
            $table->string('tag_name');
            $table->foreignId('blog_id')
                ->constrained('blogs', 'blog_id')
                ->onDelete('cascade');

            $table->timestamps();
            // $table->primary(['tag_id', 'blog_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('tags');
        Schema::dropIfExists('blog_tags');
    }
};
