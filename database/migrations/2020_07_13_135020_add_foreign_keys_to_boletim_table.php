<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBoletimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boletim', function (Blueprint $table) {
            $table->foreign('cod_matr', 'boletim_matricula_fkey')->references('cod_matr')->on('matricula')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('cod_nota', 'boletim_nota_fkey')->references('cod_nota')->on('nota')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boletim', function (Blueprint $table) {
            $table->dropForeign('boletim_matricula_fkey');
            $table->dropForeign('boletim_nota_fkey');
        });
    }
}
