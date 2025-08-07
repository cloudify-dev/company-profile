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
        Schema::create('service_page', function (Blueprint $table) {
            $table->id();
            
            // Breadcrumb Section
            $table->string('breadcrumb_title')->default('Our Services');
            $table->string('breadcrumb_image')->nullable();
            
            // Main Service Section
            $table->string('service_section_subtitle')->default('OUR SERVICES');
            $table->string('service_section_title')->default('We Provide Best Services');
            $table->text('service_section_description')->nullable();
            
            // CTA Section
            $table->string('cta_subtitle')->default('CONTACT US');
            $table->string('cta_title_black')->default('Need Any Kind Of IT Solution For');
            $table->string('cta_title_blue')->default('Your Business?');
            $table->string('cta_button_text')->default('Get In Touch');
            $table->string('cta_button_link')->default('/contact');
            $table->string('cta_background_image')->nullable();
            
            // Process Section
            $table->string('process_subtitle')->default('WORK PROCESS');
            $table->string('process_title_black')->default('How to work');
            $table->string('process_title_blue')->default('it!');
            $table->json('process_steps')->nullable(); // Store process steps as JSON
            
            // Testimonial Section
            $table->string('testimonial_subtitle')->default('CUSTOMER FEEDBACK');
            $table->string('testimonial_title_black')->default('What Happy Clients Says');
            $table->string('testimonial_title_blue')->default('About Us?');
            
            // Settings
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_page');
    }
};
