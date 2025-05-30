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
        Schema::create('stadium_playgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('stadium_branches_uid');
            $table->string('sport_types_uid');
            $table->string('stadium_types_uid');
            $table->string('playground_surface_types_uid');
            $table->json('playground_name');
            $table->string('playground_status');
            $table->string('capacity');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();

            $table->index('stadium_branches_uid');
            $table->foreign('stadium_branches_uid')->references('uid')->on('stadium_branches')->cascadeOnDelete()->cascadeOnUpdate();

            $table->index('sport_types_uid');
            $table->foreign('sport_types_uid')->references('uid')->on('sport_types')->cascadeOnDelete()->cascadeOnUpdate();

            $table->index('stadium_types_uid');
            $table->foreign('stadium_types_uid')->references('uid')->on('stadium_types')->cascadeOnDelete()->cascadeOnUpdate();

            $table->index('playground_surface_types_uid');
            $table->foreign('playground_surface_types_uid')->references('uid')->on('playground_surface_types')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadium_playgrounds');
    }
};
