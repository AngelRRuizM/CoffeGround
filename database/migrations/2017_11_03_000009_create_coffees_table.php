<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoffeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('description', 250);            
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('toast_id')->unsigned();
            $table->foreign('toast_id')->references('id')->on('toasts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('coffe_category_id')->unsigned();
            $table->foreign('coffe_category_id')->references('id')->on('coffee_categories')->onUpdate('cascade')->onDelete('cascade');
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

        Schema::create('coffee_presentation', function (Blueprint $table) {
            $table->increments('id'); 
            $table->double('price',8,2);       
            $table->integer('coffee_id')->unsigned();
            $table->foreign('coffee_id')->references('id')->on('coffees')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('presentation_id')->unsigned();
            $table->foreign('presentation_id')->references('id')->on('presentations')->onUpdate('cascade')->onDelete('cascade');
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
