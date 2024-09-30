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
                Schema::create('product_application_areas', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('product_id')->default(0)->index();
                    $table->unsignedBigInteger('application_area_id')->default(0)->index();
                    $table->timestamps();
                });
    }

    public function down(): void
    {
        Schema::dropIfExists( 'product_application_areas' );
    }
};
  