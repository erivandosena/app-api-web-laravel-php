<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCarneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carne', function (Blueprint $table) {
            $table->foreign('cod_contr', 'contrato_fkey')->references('cod_contr')->on('contrato')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carne', function (Blueprint $table) {
            $table->dropForeign('contrato_fkey');
        });
    }
}
