<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nota', function (Blueprint $table) {
            $table->foreign('cod_disc', 'disciplina_fkey')->references('cod_disc')->on('disciplina')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nota', function (Blueprint $table) {
            $table->dropForeign('disciplina_fkey');
        });
    }
}
