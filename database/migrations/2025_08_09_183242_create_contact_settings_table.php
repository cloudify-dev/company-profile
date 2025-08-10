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
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Have Any Questions?');
            $table->text('subtitle')->nullable();
            $table->json('addresses')->nullable(); // Array of addresses
            $table->json('phones')->nullable(); // Array of phone numbers
            $table->json('emails')->nullable(); // Array of email addresses
            $table->string('contact_action_type')->default('email'); // email, whatsapp, form
            $table->string('contact_action_value')->nullable(); // email address or whatsapp number
            $table->text('map_embed_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
