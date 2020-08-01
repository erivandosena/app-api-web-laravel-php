<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigInteger('cod_matr', true);
            $table->string('matricula', 17)->nullable();
            $table->bigInteger('cod_alun')->nullable();
            $table->integer('cod_curs')->nullable();
            $table->integer('cod_seri')->nullable();
            $table->integer('cod_turn')->nullable();
            $table->integer('cod_turm')->nullable();
            $table->integer('cod_leti')->nullable();
            $table->integer('cod_esco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
