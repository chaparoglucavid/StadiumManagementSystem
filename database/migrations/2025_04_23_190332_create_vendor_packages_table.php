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
        Schema::create('vendor_packages', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('package_name');
            $table->string('package_description')->nullable();
            $table->double('amount', 8, 2);
            $table->double('commission', 8,2);
            $table->string('logo')->nullable();
            $table->integer('duration')->default(30);
            $table->enum('status', ['active', 'inactive']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_packages');
    }
};
