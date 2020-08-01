<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolas', function (Blueprint $table) {
            $table->integer('cod_esco', true);
            $table->string('nome_empresarial', 150)->nullable();
            $table->string('nome_fantasia', 60)->nullable();
            $table->string('cnpj', 18);
            $table->string('ie', 11)->nullable();
            $table->string('slogan', 50)->nullable();
            $table->text('logotipo')->nullable();
            $table->string('endereco', 50)->nullable();
            $table->string('bairro', 30)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('cidade', 25)->nullable();
            $table->string('estado', 25)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('rede_social', 150)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('website', 25)->nullable();
            $table->string('diretor', 50)->nullable();
            $table->string('diretor_reg', 15)->nullable();
            $table->string('secretario', 50)->nullable();
            $table->string('secretario_reg', 15)->nullable();
            $table->string('entid_mantenedora', 60)->nullable();
            $table->string('dependencia_admin', 10)->nullable();
            $table->string('credenc_parecer', 25)->nullable();
            $table->string('credenc_parecer_val', 10)->nullable();
            $table->string('recredenc_parecer', 25)->nullable();
            $table->string('recredenc_parecer_val', 15)->nullable();
            $table->string('orgao_expedidor', 15)->nullable();
            $table->string('orgao_expedidor_val', 25)->nullable();
            $table->string('diario_oficial', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escolas');
    }
}
