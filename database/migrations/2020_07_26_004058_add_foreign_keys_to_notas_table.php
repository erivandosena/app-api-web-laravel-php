<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->foreign('cod_disc', 'disciplina_fkey')->references('cod_disc')->on('disciplinas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cod_esco', 'escola_fkey')->references('cod_esco')->on('escolas')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->dropForeign('disciplina_fkey');
            $table->dropForeign('escola_fkey');
        });
    }
}
