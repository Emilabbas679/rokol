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
        Schema::table( 'products', function ( Blueprint $table ) {
            $table->tinyInteger( 'has_colors' )->comment('0 is product does not have color, 1 is product has 1 or more colors, 2 is product has all colors.')->default( 0 );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table( 'products', function ( Blueprint $table ) {
            $table->dropColumn( 'has_colors' );
        } );
    }
};
