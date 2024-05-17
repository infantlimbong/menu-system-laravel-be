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
        Schema::dropIfExists('best_sellings');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('best_sellings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->boolean('enabled')->default(false);
            $table->timestamps();
        });
    }
};
