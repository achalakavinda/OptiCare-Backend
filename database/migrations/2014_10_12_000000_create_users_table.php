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

        Schema::create('user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_type_id');
            $table->string('name');
            $table->string('img_url')->default("https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-512.png");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_type_id')
                ->references('id')
                ->on('user_types')
                ->onDelete('cascade');

        });

        DB::table('user_types')->insert([
            [
                'id'=>1,
                'name' => 'Admin'
            ],
            [
                'id'=>2,
                'name' => 'Vendor'
            ],
            [
                'id'=>3,
                'name' => 'Optician'
            ],
            [
                'id'=>4,
                'name' => 'Patient'
            ]
        ]);

        DB::table('users')->insert([
            [
                'id'=>1,
                'name' => 'admin',
                'email' => 'admin@test.com',
                'user_type_id'=>1,
                'password' => bcrypt('admin123')
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
        Schema::dropIfExists('user_types');
    }
}
