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
        Schema::create('color_group_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'color_group_id' )->nullable( false );
            $table->unsignedBigInteger( 'color_id' )->nullable( false );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_group_pivot');
    }
};
