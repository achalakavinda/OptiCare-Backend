<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('optician_id');
            $table->string('optician_name')->default('unknown');
            $table->unsignedInteger('patient_id');
            $table->string('patient_name')->default('unknown');

            $table->date('date');
            $table->enum('type',['Generic','Myopia','Hyperopia'])->default('Generic');
            $table->boolean('isMobile')->default(false);
            $table->enum('status',['Pending','Close','Appointment'])->default('Close');
            $table->text('note')->nullable();

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
        Schema::dropIfExists('check_ups');
    }
}
