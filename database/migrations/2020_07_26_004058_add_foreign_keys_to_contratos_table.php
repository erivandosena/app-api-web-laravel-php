<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->foreign('cod_matr', 'matricula_fkey')->references('cod_matr')->on('matriculas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign('matricula_fkey');
            $table->dropForeign('escola_fkey');
        });
    }
}
