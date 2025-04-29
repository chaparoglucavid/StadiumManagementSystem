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
        Schema::create('stadiums_features', function (Blueprint $table) {
            $table->id();
            $table->string('stadiums_uid');
            $table->string('features_uid');
            $table->timestamps();

            $table->index('stadiums_uid');
            $table->index('features_uid');

            $table->foreign('stadiums_uid')->references('uid')->on('stadiums')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('features_uid')->references('uid')->on('features')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadiums_features');
    }
};
