<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_name');
            $table->string('email');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('present_address');
            $table->string('parmanent_address');
            $table->string('designation');
            $table->string('department');
            $table->integer('mobile_number');
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
        Schema::dropIfExists('tbl_employee');
    }
}
