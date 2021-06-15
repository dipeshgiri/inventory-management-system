<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
        $table->increments('id');
        $table->string('supplier_name',40);
        $table->string('supplier_address',40);
        $table->string('supplier_phone');
        $table->string('supplier_email',40);
        $table->integer('supplier_credit_time_days');
        $table->string('supplier_pan_details',9)->nullable();
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
