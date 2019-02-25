<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinments', function (Blueprint $table) {
            $table->increments('id');
            //scores information

            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('optician_id');
            $table->time('time');
            $table->date('date');
            $table->text('patient_note');
            $table->text('optician_note');
            $table->boolean('confirmation')->default(false);
            $table->boolean('closed')->default(false);

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
        Schema::dropIfExists('appoinments');
    }
}
