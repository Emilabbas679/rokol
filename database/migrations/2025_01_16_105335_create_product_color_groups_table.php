<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create( 'product_color_groups', function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger( 'product_id' )->nullable( false );
            $table->unsignedBigInteger( 'color_group_id' )->nullable( false );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists( 'product_color_groups' );
    }
};
