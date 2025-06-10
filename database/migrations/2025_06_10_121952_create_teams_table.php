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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // Rachna Sheth
            $table->string('position');               // CEO, Product Manager, etc
            $table->text('bio')->nullable();          // Deskripsi singkat
            $table->string('phone')->nullable();      // +1 935-654-2587
            $table->string('email')->nullable();      // info@rachna.com
            $table->string('availability')->nullable(); // 10:00AM - 4:00PM
            $table->string('image')->nullable();      // path ke foto profil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
