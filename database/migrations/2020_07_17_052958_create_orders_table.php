<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->float('sub_total');
            $table->float('discount_amount')->default(0);
            $table->string('coupon_name');
            $table->float('total');
            $table->integer('payment_method');
            $table->integer('payment_status')->default(1);
            $table->unsignedBigInteger('billing_id');
            $table->unsignedBigInteger('shipping_id');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users');
            // $table->foreign('billing_id')
            //     ->references('id')
            //     ->on('billings');
            // $table->foreign('shipping_id')
            //     ->references('id')
            //     ->on('shippings');

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
