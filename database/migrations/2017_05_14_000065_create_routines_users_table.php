<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines_users', function (Blueprint $table) {
            $table->integer('routine_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['routine_id', 'user_id']);

            $table->foreign('routine_id')
                  ->references('id')->on('routines')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('routines_users');
    }
}
