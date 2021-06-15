<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseOrderBillDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('purchase_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->float('total_amt',10,2);
            $table->float('discount_percent',10,2)->nullable();
            $table->float('discount_amount',10,2)->nullable();
            $table->float('vat_amt',10,2)->nullable();
            $table->float('total_amt_with_vat',10,2);
            $table->date('date');
            $table->integer('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
