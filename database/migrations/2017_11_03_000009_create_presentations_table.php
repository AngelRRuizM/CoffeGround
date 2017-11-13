<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationsTable extends Migration
{
    /**
     * Crea la tabla presentations, para saber mas, consultar el diagrama relacional de la base de datos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weight', 15);
            $table->decimal('price', 8, 2);
            $table->integer('ground_id')->unsigned();
            $table->foreign('ground_id')->references('id')->on('grounds')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('coffee_id')->unsigned();
            $table->foreign('coffee_id')->references('id')->on('coffees')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('presentations');
    }
}
