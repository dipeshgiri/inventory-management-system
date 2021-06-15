<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('customer_name',40);
            $table->string('customer_address',40);
            $table->integer('customer_phone'); 
            $table->integer('customer_email');
            $table->integer('customer_credit_time_days');
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
