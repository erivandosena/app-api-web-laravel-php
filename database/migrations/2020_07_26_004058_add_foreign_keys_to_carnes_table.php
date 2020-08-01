<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCarnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carnes', function (Blueprint $table) {
            $table->foreign('cod_cont', 'contrato_fkey')->references('cod_cont')->on('contratos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
        Schema::table('carnes', function (Blueprint $table) {
            $table->dropForeign('contrato_fkey');
            $table->dropForeign('escola_fkey');
        });
    }
}
