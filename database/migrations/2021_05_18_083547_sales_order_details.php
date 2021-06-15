<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalesOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_details',function(Blueprint $table){
        $table->increments('id');
        $table->integer('invoice_id')->unsigned();
        $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
        $table->integer('product_id')->unsigned();
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->integer('quantity');
        $table->float('unit_price',10,2);
        $table->date('date');
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
