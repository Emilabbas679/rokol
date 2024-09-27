<?php

use App\Models\ProductOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create( 'product_orders', function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger( 'user_id' );
            $table->unsignedBigInteger( 'address_id' )->nullable();
            $table->double( 'amount', 9, 2 );
            $table->enum( 'delivered_status', [ ProductOrder::DELIVERED_STATUS_COMPLETED, ProductOrder::DELIVERED_STATUS_PREPARING, ProductOrder::DELIVERED_STATUS_CANCELED ] );
            $table->unsignedSmallInteger( 'item_count' );
            $table->enum( 'payment_method', [ ProductOrder::PAYMENT_METHOD_CASH, ProductOrder::PAYMENT_METHOD_ONLINE, ProductOrder::PAYMENT_METHOD_CARD, ] );
            $table->double( 'total_discount', 9, 2 );

            $table->softDeletes();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists( 'product_orders' );
    }
};
