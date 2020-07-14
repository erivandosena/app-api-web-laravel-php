<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carne', function (Blueprint $table) {
            $table->bigInteger('cod_carn', true);
            $table->bigInteger('cod_contr');
            $table->string('numero_doc', 17)->nullable();
            $table->string('mes', 10)->nullable();
            $table->timestamp('data_vencimento')->nullable();
            $table->timestamp('data_pagamento')->nullable();
            $table->decimal('valor_mensal', 20)->nullable();
            $table->decimal('valor_acresc', 20)->nullable();
            $table->decimal('valor_descon', 20)->nullable();
            $table->string('numero_parcela', 5)->nullable();
            $table->string('situacao_parcela', 9)->nullable();
            $table->decimal('valor_apagar', 20)->nullable();
            $table->decimal('valor_pago', 20)->nullable();
            $table->decimal('valor_pendente', 20)->nullable();
            $table->decimal('total_pago', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carne');
    }
}
