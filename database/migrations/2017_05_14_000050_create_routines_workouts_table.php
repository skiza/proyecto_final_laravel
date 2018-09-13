<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines_workouts', function (Blueprint $table) {
            $table->integer('routine_id')->unsigned();
            $table->integer('workout_id')->unsigned();
            $table->integer('sets')->unsigned()->nullable();
            $table->integer('reps')->unsigned()->nullable();

            $table->primary(['routine_id', 'workout_id']);

            $table->foreign('routine_id')
                  ->references('id')->on('routines')
                  ->onDelete('cascade');

            $table->foreign('workout_id')
                  ->references('id')->on('workouts')
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
        Schema::dropIfExists('routines_workouts');
    }
}
