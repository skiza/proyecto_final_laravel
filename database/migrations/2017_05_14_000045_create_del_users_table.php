<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('del_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID');
            $table->string('alias');
            $table->string('email');
            $table->string('password');
            $table->date('age');
            $table->string('gender')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('privacy_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->text('stored_routines')->nullable();
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
        Schema::dropIfExists('del_users');
    }
}
