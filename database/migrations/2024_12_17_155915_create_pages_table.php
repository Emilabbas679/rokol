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
        Schema::create( 'pages', function ( Blueprint $table ) {
            $table->id();
            $table->json( 'title' )->nullable( false );
            $table->json( 'body' )->nullable( false );
            $table->string( 'image' )->nullable();
            $table->boolean( 'active_status' )->nullable( false );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists( 'pages' );
    }
};
