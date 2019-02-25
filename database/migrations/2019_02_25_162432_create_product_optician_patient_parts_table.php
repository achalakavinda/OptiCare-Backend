<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOpticianPatientPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_optician_patient_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');

            $table->integer('lens_type_id')->nullable();
            $table->string('lens_type');

            $table->integer('vision_type_id')->nullable();
            $table->string('vision_type');

            $table->unsignedInteger('patient_user_id');
            $table->unsignedInteger('optician_user_id');
            $table->timestamps();

            $table->foreign('patient_user_id')
                ->references('id')
                ->on('users');

            $table->foreign('optician_user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_optician_patient_parts');
    }
}
