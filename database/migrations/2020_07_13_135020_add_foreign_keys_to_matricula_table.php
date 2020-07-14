<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matricula', function (Blueprint $table) {
            $table->foreign('cod_alun', 'aluno_fkey')->references('cod_alun')->on('aluno')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cod_curs', 'curso_fkey')->references('cod_curs')->on('curso')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cod_seri', 'serie_fkey')->references('cod_seri')->on('serie')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cod_turm', 'turma_fkey')->references('cod_turm')->on('turma')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cod_turn', 'turno_pkey')->references('cod_turn')->on('turno')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cod_leti', 'letivo_pkey')->references('cod_leti')->on('letivo')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matricula', function (Blueprint $table) {
            $table->dropForeign('aluno_fkey');
            $table->dropForeign('curso_fkey');
            $table->dropForeign('serie_fkey');
            $table->dropForeign('turma_fkey');
            $table->dropForeign('turno_pkey');
            $table->dropForeign('letivo_pkey');
        });
    }
}
