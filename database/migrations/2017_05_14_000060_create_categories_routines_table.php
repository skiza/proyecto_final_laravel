<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_routines', function (Blueprint $table) {
            $table->integer('routine_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->primary(['routine_id', 'category_id']);

            $table->foreign('routine_id')
                  ->references('id')->on('routines')
                  ->onDelete('cascade');

            $table->foreign('category_id')
                  ->references('id')->on('categories')
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
        Schema::dropIfExists('categories_routines');
    }
}
