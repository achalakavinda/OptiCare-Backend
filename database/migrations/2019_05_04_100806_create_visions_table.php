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
            $table->integer('parent_id')->default(0);

            $table->unsignedInteger('check_up_id');

            $table->string('l_sphere')->nullable();
            $table->string('l_cyl')->nullable();
            $table->string('l_axis')->nullable();
            $table->string('l_add')->nullable();
            $table->string('l_p&b')->nullable();

            $table->string('r_sphere')->nullable();
            $table->string('r_cyl')->nullable();
            $table->string('r_axis')->nullable();
            $table->string('r_add')->nullable();
            $table->string('r_p&b')->nullable();
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
