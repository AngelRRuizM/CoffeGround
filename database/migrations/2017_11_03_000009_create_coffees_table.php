<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoffeesTable extends Migration
{
    /**
     * Crea la tabla coffee, para saber mas, consultar el diagrama relacional de la base de datos.
     * Tambien se crea la tabla cruce coffee_image que relaciona coffee con image
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en', 100);
            $table->string('description_en', 500);
            $table->string('name_es', 100);
            $table->string('description_es', 500);            
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('toast_id')->unsigned();
            $table->foreign('toast_id')->references('id')->on('toasts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('coffee_category_id')->unsigned();
            $table->foreign('coffee_category_id')->references('id')->on('coffee_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('coffee_image', function (Blueprint $table) {
            $table->increments('id');          
            $table->integer('coffee_id')->unsigned();
            $table->foreign('coffee_id')->references('id')->on('coffees')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('image_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('coffee_image');
        Schema::dropIfExists('coffee_presentation');
        Schema::dropIfExists('coffees');
    }
}
