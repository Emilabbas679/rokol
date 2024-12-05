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
        Schema::create('filters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'category_id' )->nullable();
            $table->unsignedBigInteger( 'brand_id' )->nullable();
            $table->unsignedBigInteger( 'property_id' )->nullable();
            $table->unsignedBigInteger( 'appearance_id' )->nullable();
            $table->unsignedBigInteger( 'weight_id' )->nullable();
            $table->unsignedBigInteger( 'count' )->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filters');
    }
};
