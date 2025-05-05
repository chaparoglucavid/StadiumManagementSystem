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
        Schema::create('stadium_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('stadiums_uid');
            $table->string('vendor_packages_uid');
            $table->string('package_name');
            $table->string('package_description')->nullable();
            $table->double('amount', 8, 2);
            $table->double('commission', 8,2);
            $table->integer('duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->softDeletes();
            $table->timestamps();

            $table->index('stadiums_uid');
            $table->index('vendor_packages_uid');

            $table->foreign('stadiums_uid')->references('uid')->on('stadiums')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('vendor_packages_uid')->references('uid')->on('vendor_packages')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadium_subscriptions');
    }
};
