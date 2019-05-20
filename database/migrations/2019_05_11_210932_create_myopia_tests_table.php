<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyopiaTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myopia_tests', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('test_summery_id');
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('optician_id');
            $table->string('Constant');
            $table->string('Answer');
            $table->string('Result');
            $table->float('point')->default(0);

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
        Schema::dropIfExists('myopia_tests');
    }
}
