<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->enum('status', ['placed', 'accepted', 'denied', 'returned', 'cancelled', 'out_for_delivery', 'delivered'])->default('placed');
            $table->string('total')->default('0');
            $table->string('address_id');
            $table->string('shipping_fee')->nullable();
            $table->enum('payment_type', ['cod', 'rzp']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
