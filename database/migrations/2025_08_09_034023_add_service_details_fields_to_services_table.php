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
        Schema::table('services', function (Blueprint $table) {
            // Video section
            $table->string('video_url')->nullable();
            $table->string('video_thumbnail')->nullable();
            
            // Additional content section
            $table->string('section_title')->default('We Serve The Best Work');
            $table->json('checklist_items')->nullable(); // For the checklist items
            $table->longText('additional_description')->nullable();
            
            // Benefits section
            $table->string('benefits_title')->default('Benefits With Our Service');
            
            // FAQ section
            $table->string('faqs_title')->default('Questions About Service');
            
            // Sidebar content
            $table->string('sidebar_title')->default('All Services');
            $table->json('sidebar_services')->nullable(); // For sidebar service links
            
            // Brochure downloads
            $table->string('brochure_pdf')->nullable();
            $table->string('brochure_doc')->nullable();
            
            // Contact widget
            $table->string('contact_widget_text')->default('CONTACT US NOW');
            $table->string('contact_widget_title')->default('You Need Help?');
            $table->string('contact_widget_button_text')->default('GET A QUOTE');
            $table->string('contact_widget_button_link')->default('/contact');
            $table->string('contact_widget_background')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'video_url',
                'video_thumbnail',
                'section_title',
                'checklist_items',
                'additional_description',
                'benefits_title',
                'faqs_title',
                'sidebar_title',
                'sidebar_services',
                'brochure_pdf',
                'brochure_doc',
                'contact_widget_text',
                'contact_widget_title',
                'contact_widget_button_text',
                'contact_widget_button_link',
                'contact_widget_background'
            ]);
        });
    }
};
