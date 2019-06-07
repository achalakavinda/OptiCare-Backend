<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();

            $table->string('avatar_id')->nullable();
            $table->integer('optician_id')->nullable();
//           $table->integer('role_id')->index()->unsigned()->nullable();

            // app specific columns.

            $table->enum('type', ['admin', 'optician', 'patient','user']);

            $table->boolean('is_active')->default(1);

            $table->rememberToken();
            $table->timestamps();


        });

        DB::table('users')->insert([
            [
                'id'=>1,
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('admin123'),
                'type'=>'admin'
            ]
        ]);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
