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
            $table->boolean( 'offer_of_week' )->after( 'guarantee' )->default( 0 );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table( 'products', function ( Blueprint $table ) {
            $table->dropColumn( 'offer_of_week' );
        } );
    }
};