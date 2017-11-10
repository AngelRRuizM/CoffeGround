<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToastsTable extends Migration
{
    /**
     * Crea la tabla toasts, para saber mas, consultar el diagrama relacional de la base de datos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toasts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en', 100);
            $table->string('description_en', 500);
            $table->string('name_es', 100);
            $table->string('description_es', 500);
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
        Schema::dropIfExists('toasts');
    }
}
