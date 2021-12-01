<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelGestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh', function (Blueprint $table) {
            $table->id();
            $table->string('funcionario');
            $table->string('cargo');
            $table->string('setor');
            $table->double('salario', 8, 2);
            $table->unsignedBigInteger('id_gestor');
            $table->timestamps();
        });

        Schema::table('rh', function (Blueprint $table) {
            $table->foreign('id_gestor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rh');
    }
}
