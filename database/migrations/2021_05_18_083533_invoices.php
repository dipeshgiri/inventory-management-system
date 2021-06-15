<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices',function(Blueprint $table){
        $table->increments('id');
        $table->integer('customer_id')->unsigned();
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        $table->float('amount',10,2);
        $table->float('discount-amt',10,2);
        $table->float('vat_amt',10,2);
        $table->float('total_amt',10,2);
        $table->date('date');
        $table->boolean('payment-status');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
