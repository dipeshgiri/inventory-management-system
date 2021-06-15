<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_order_detail_id')->unsigned();
            $table->foreign('purchase_order_detail_id')->references('id')->on('purchase_order_details')->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->float('unit_price',10,2);
            $table->integer('product_quantity'); 
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
