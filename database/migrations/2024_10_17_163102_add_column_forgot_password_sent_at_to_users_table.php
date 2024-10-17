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
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->string( 'phone_verify_code', 4 )->nullable()->after( 'remember_token' );
            $table->dateTime( 'forgot_password_sent_at' )->nullable()->after( 'phone_verify_code' );
            $table->string( 'forgot_password_token' )->nullable()->after( 'forgot_password_sent_at' );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropColumn( 'phone_verify_code' );
            $table->dropColumn( 'forgot_password_sent_at' );
            $table->dropColumn( 'forgot_password_token' );
        } );
    }
};
