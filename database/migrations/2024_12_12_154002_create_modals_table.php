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
        Schema::create( 'modals', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'image_path' )->nullable();
            $table->string( 'video_url' )->nullable();
            $table->boolean( 'is_video' )->nullable()->default( 0 );
            $table->dateTime( 'expire_time' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists( 'modals' );
    }
};
