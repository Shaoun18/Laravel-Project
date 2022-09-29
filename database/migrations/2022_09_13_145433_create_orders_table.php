<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('customer_id');
            $table->float('order_total', 11,3);
            $table->integer('tax_total');
            $table->integer('shipping_total');
            $table->text('delivery_address');
            $table->text('order_status')->default('Pending');
            $table->text('order_date')->nullable();
            $table->text('order_timestamp')->nullable();
            $table->text('payment_status')->default('Pending');
            $table->text('payment_method');
            $table->text('payment_date')->nullable();
            $table->text('payment_timestamp')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('delivery_status')->default('Pending');
            $table->text('delivery_date')->nullable();
            $table->text('delivery_timestamp')->nullable();
            $table->text('currency')->nullable();
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
};
