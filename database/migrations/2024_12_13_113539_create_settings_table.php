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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string( 'site_name' )->nullable();
            $table->string( 'site_logo' )->nullable();
            $table->json( 'social_media' )->nullable();
            $table->string( 'phone_number_short' )->nullable();
            $table->string( 'phone_number_long' )->nullable();
            $table->string( 'email_contact' )->nullable();
            $table->string( 'email_footer' )->nullable();
            $table->string( 'address_contact' )->nullable();
            $table->string( 'address_footer' )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
