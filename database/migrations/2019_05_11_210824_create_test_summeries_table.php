<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestSummeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //this belongs to  mobile test
    public function up()
    {
        Schema::create('test_summeries', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('optician_id');
            $table->unsignedInteger('patient_id');
            $table->date('date')->default(\Carbon\Carbon::now());

            $table->enum('type',['myopia','hyperpia']);

            $table->boolean('isPass')->default(false);
            $table->boolean('isCheckupCreated')->default(false);
            $table->boolean('isAppointmentCreated')->default(false);
            $table->float('score')->default(0);

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
        Schema::dropIfExists('test_summeries');
    }
}
