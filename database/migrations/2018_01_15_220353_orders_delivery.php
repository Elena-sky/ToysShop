<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orders_delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phone');
            $table->string('city');
            $table->string('payment_method');
            $table->string('delivery_method');
            $table->string('delivery_address');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders_delivery');
    }
}
