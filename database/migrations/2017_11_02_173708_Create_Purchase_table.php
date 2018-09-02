<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_purchase', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_no');
            $table->integer('product_id');
            $table->integer('supplier_id');
            $table->integer('purchase_qty');
            $table->integer('purchase_price_unit');
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
        Schema::dropIfExists('tbl_purchase');
    }
}
