<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StockDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_details', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('product_id')->unsigned();
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->integer('unit_in_stock');
        $table->float('unit_price');
        

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
