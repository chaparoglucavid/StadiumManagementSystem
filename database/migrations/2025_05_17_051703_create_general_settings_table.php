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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->json('site_name')->nullable();
            $table->json('site_description')->nullable();

            $table->string('timezone')->default('UTC');
            $table->string('date_format')->default('Y-m-d');
            $table->string('time_format')->default('H:i');
            $table->string('default_language', 10)->default('az');

            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();

            $table->json('meta_keywords')->nullable();
            $table->json('meta_description')->nullable();

            $table->string('primary_color', 20)->default('#007bff');
            $table->string('secondary_color', 20)->default('#6c757d');

            $table->boolean('maintenance_mode')->default(false);
            $table->json('maintenance_message')->nullable();

            $table->json('support_email')->nullable();
            $table->json('support_phone')->nullable();

            $table->json('social_networks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
