<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stadiums', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('users_uid');
            $table->string('vendor_packages_uid')->nullable();
            $table->json('name');
            $table->json('description')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
            $table->softDeletes();
            $table->timestamps();

            $table->index('users_uid');
            $table->index('vendor_packages_uid');

            $table->foreign('users_uid')->references('uid')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('vendor_packages_uid')->references('uid')->on('vendor_packages')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadiums');
    }
};
