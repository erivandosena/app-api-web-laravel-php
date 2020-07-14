<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escola', function (Blueprint $table) {
            $table->integer('cod_esco', true);
            $table->string('nome_empresarial', 116)->nullable();
            $table->string('nome_fantasia', 56)->nullable();
            $table->string('cnpj', 18);
            $table->string('ie', 11)->nullable();
            $table->string('slogan', 50)->nullable();
            $table->string('endereco', 50)->nullable();
            $table->string('bairro', 30)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('cidade', 25)->nullable();
            $table->string('estado', 25)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('website', 25)->nullable();
            $table->string('socio_1', 50)->nullable();
            $table->string('socio_2', 50)->nullable();
            $table->binary('logo_empresa')->nullable();
            $table->float('juros')->nullable();
            $table->float('multa')->nullable();
            $table->decimal('mensalidade_ei', 20)->nullable();
            $table->decimal('mensalidade_efi', 20)->nullable();
            $table->decimal('mensalidade_efii', 20)->nullable();
            $table->decimal('mensalidade_em', 20)->nullable();
            $table->string('vencimento_dia', 10)->nullable();
            $table->string('diretor', 50)->nullable();
            $table->string('diretor_reg', 15)->nullable();
            $table->string('secretario', 50)->nullable();
            $table->string('secretario_reg', 15)->nullable();
            $table->string('entid_mantenedora', 56)->nullable();
            $table->string('dependencia_admin', 10)->nullable();
            $table->string('credenc_parecer', 25)->nullable();
            $table->string('credenc_parecer_val', 10)->nullable();
            $table->string('recredenc_parecer', 25)->nullable();
            $table->string('recredenc_parecer_val', 10)->nullable();
            $table->string('instrucao_carne_alun1', 50)->nullable();
            $table->string('instrucao_carne_alun2', 50)->nullable();
            $table->string('instrucao_carne_com1', 50)->nullable();
            $table->string('instrucao_carne_com2', 50)->nullable();
            $table->text('instrucao_boletim_apro')->nullable();
            $table->text('instrucao_boletim_repro')->nullable();
            $table->string('orgao_expedidor', 15)->nullable();
            $table->string('orgao_expedidor_val', 20)->nullable();
            $table->string('diario_oficial', 20)->nullable();
            $table->integer('livro_numero')->nullable();
            $table->integer('folha_numero')->nullable();
            $table->integer('registro_numero')->nullable();
            $table->integer('total_folhas_livro')->nullable();
            $table->integer('total_reg_folha')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escola');
    }
}
