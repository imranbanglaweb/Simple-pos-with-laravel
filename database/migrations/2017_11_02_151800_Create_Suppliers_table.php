<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_suppliers', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('supplier_code');
        $table->string('supplier_name');
        $table->string('supplier_address');
    $table->string('supplier_contact_person');
        $table->integer('supplier_phone');
        $table->string('supplier_status');
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
        Schema::dropIfExists('tbl_suppliers');
    }
}
