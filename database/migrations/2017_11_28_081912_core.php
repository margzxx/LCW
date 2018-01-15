<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Core extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('areas',function(Blueprint $table){

            $table->increments('id');
            $table->string('description');
            $table->boolean('status');
            $table->timestamps();

        });
        
        Schema::create('questions',function(Blueprint $table){

            $table->increments('id');
            $table->string('scope');
            $table->integer('area_id');
            $table->string('type');
            $table->longtext('description');
            $table->boolean('status');
            $table->integer('order')->nullable();
            $table->timestamps();

        });

        Schema::create('choices',function(Blueprint $table){

            $table->increments('id');
            $table->integer('question_id');
            $table->longtext('description');
            $table->timestamps();

        });

        Schema::create('answers',function(Blueprint $table){

            $table->increments('id');
            $table->integer('area_id');
            $table->integer('question_id');
            $table->integer('user_id');
            $table->longtext('description');
            $table->timestamps();

        });

        Schema::create('files',function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
            $table->longtext('description');
            $table->text('document');
            $table->timestamps();

        });

        Schema::create('experiences',function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
            $table->longtext('description');
            $table->timestamps();

        });

        Schema::create('skills',function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
            $table->longtext('description');
            $table->timestamps();

        });

        Schema::create('preferences',function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
            $table->longtext('description');
            $table->timestamps();

        });

        Schema::create('goals',function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
            $table->longtext('description');
            $table->timestamps();

        });

        Schema::create('descriptions',function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('type');
            $table->longtext('content');
            $table->timestamps();

        });

        Schema::create('verifications',function(Blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('status')->nullable();
            $table->timestamps();

        });

        Schema::create('matches',function(Blueprint $table){

            $table->increments('id');
            $table->integer('entrepreneur_id');
            $table->integer('va_id');
            $table->boolean('status');
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
        Schema::drop('areas');
        Schema::drop('questions');
        Schema::drop('choices');
        Schema::drop('answers');
        Schema::drop('files');
        Schema::drop('experiences');
        Schema::drop('skills');
        Schema::drop('descriptions');
        Schema::drop('preferences');
        Schema::drop('goals');
        Schema::drop('verifications');
        Schema::drop('matches');
    }
}
