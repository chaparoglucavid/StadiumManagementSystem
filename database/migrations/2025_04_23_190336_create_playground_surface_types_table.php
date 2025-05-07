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
        Schema::create('playground_surface_types', function (Blueprint $table) {
            $table->string('uid')->unique();
            $table->string('sport_types_uid');
            $table->json('name');
            $table->json('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();

            $table->index('sport_types_uid');
            $table->foreign('sport_types_uid')->references('uid')->on('sport_types')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playground_surface_types');
    }
};
