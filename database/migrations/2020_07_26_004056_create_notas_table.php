<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigInteger('cod_nota', true);
            $table->integer('cod_disc');
            $table->string('etapa_1_mar', 5)->nullable();
            $table->string('etapa_1_abr', 5)->nullable();
            $table->string('etapa_1_av3', 5)->nullable();
            $table->string('etapa_1_m', 5)->nullable();
            $table->string('etapa_1_r', 5)->nullable();
            $table->string('etapa_2_mai', 5)->nullable();
            $table->string('etapa_2_jun', 5)->nullable();
            $table->string('etapa_2_av3', 5)->nullable();
            $table->string('etapa_2_m', 5)->nullable();
            $table->string('etapa_2_r', 5)->nullable();
            $table->string('etapa_3_ago', 5)->nullable();
            $table->string('etapa_3_set', 5)->nullable();
            $table->string('etapa_3_av3', 5)->nullable();
            $table->string('etapa_3_m', 5)->nullable();
            $table->string('etapa_3_r', 5)->nullable();
            $table->string('etapa_4_out', 5)->nullable();
            $table->string('etapa_4_nov', 5)->nullable();
            $table->string('etapa_4_av3', 5)->nullable();
            $table->string('etapa_4_m', 5)->nullable();
            $table->string('etapa_4_r', 5)->nullable();
            $table->string('provao', 5)->nullable();
            $table->string('provao_r', 5)->nullable();
            $table->string('media_final', 5)->nullable();
            $table->integer('faltas')->nullable();
            $table->string('pontos', 4)->nullable();
            $table->string('resultado_final', 11)->nullable();
            $table->string('tipo_distribuida')->nullable();
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
        Schema::dropIfExists('notas');
    }
}
