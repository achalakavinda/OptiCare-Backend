<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('optician_id');
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('parent_id');

            $table->string('l_sphere');
            $table->string('l_cyl');
            $table->string('l_axis');
            $table->string('l_add');
            $table->string('l_p&b');

            $table->string('r_sphere');
            $table->string('r_cyl');
            $table->string('r_axis');
            $table->string('r_add');
            $table->string('r_p&b');
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
        Schema::dropIfExists('visions');
    }
}
