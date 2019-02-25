<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOpticianPatientPartImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_optician_patient_part_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('p_o_p_p_id');
            $table->text('path');
            $table->timestamps();

            $table->foreign('p_o_p_p_id')
                ->references('id')
                ->on('product_optician_patient_parts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_optician_patient_part_images');
    }
}
