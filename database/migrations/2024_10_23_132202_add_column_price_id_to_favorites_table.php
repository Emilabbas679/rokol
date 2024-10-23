<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table( 'favorites', function ( Blueprint $table ) {
            $table->unsignedBigInteger( 'price_id' )->after( 'product_id' );
            if ( collect( DB::select( "SHOW INDEXES FROM favorites" ) )
                ->pluck( 'Key_name' )
                ->contains( 'favorites_user_id_product_id_unique' ) ) {
                $table->dropUnique( 'favorites_user_id_product_id_unique' );
            }
            $table->unique( [
                                'user_id', 'product_id', 'price_id',
                            ] );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table( 'favorites', function ( Blueprint $table ) {
            $table->dropColumn( 'price_id' );
        } );
    }
};
