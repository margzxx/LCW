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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('country');
            $table->string('mobile_number');
            $table->string('gender');
            $table->string('educational_attainment')->nullable();
            $table->string('course')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('residence')->nullable();
            $table->longtext('address')->nullable();
            $table->string('home_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('no_of_dependents')->nullable();
            $table->string('nationality')->nullable();
            $table->string('type')->nullable();
            $table->string('role');
            $table->string('avatar')->nullable();
            $table->boolean('status');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
