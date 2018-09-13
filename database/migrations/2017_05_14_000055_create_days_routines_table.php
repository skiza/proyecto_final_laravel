<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days_routines', function (Blueprint $table) {
            $table->integer('routine_id')->unsigned();
            $table->integer('day_id')->unsigned();

            $table->primary(['routine_id', 'day_id']);

            $table->foreign('routine_id')
                  ->references('id')->on('routines')
                  ->onDelete('cascade');

            $table->foreign('day_id')
                  ->references('id')->on('days')
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
        Schema::dropIfExists('days_routines');
    }
}
