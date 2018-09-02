<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_no');
            $table->string('sale_qty');
            $table->string('sale_unit_price');
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->string('sale_note');
            $table->dateTime('sale_date');
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
        Schema::dropIfExists('tbl_sales');
    }
}
