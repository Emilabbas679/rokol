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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->tinyInteger('status')->default(0)->index();
            $table->tinyInteger('category_id')->default(0)->index();
            $table->integer('stock_count')->default(0)->index();
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->text('about')->nullable();
            $table->text('usage')->nullable();
            $table->text('advantage')->nullable();
            $table->text('properties')->nullable();
            $table->text('consumption')->nullable();
            $table->text('retention')->nullable();
            $table->text('warning')->nullable();
            $table->text('guarantee')->nullable();
            $table->timestamps();
        });



        Schema::create('product_appearances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->default(0)->index();
            $table->unsignedBigInteger('appearance_id')->default(0)->index();
            $table->timestamps();
        });

        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->default(0)->index();
            $table->unsignedBigInteger('color_id')->default(0)->index();
            $table->unsignedBigInteger('weight_id')->default(0)->index();
            $table->float('price')->default(0);
            $table->float('sale_price')->default(0);
            $table->timestamps();
        });

        Schema::create('product_application_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->default(0)->index();
            $table->unsignedBigInteger('application_area_id')->default(0)->index();
            $table->timestamps();
        });
        Schema::create('product_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->default(0)->index();
            $table->unsignedBigInteger('property_id')->default(0)->index();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
