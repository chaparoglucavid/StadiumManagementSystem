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
        Schema::create('stadium_branches', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('cities_uid');
            $table->string('regions_uid')->nullable();
            $table->string('stadiums_uid');
            $table->json('branch_name');
            $table->string('branch_latitude');
            $table->string('branch_longitude');
            $table->string('branch_address');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();

            $table->index('cities_uid');
            $table->foreign('cities_uid')->references('uid')->on('cities')->cascadeOnDelete()->cascadeOnUpdate();

            $table->index('regions_uid');
            $table->foreign('regions_uid')->references('uid')->on('regions')->cascadeOnDelete()->cascadeOnUpdate();

            $table->index('stadiums_uid');
            $table->foreign('stadiums_uid')->references('uid')->on('stadiums')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadium_branches');
    }
};
