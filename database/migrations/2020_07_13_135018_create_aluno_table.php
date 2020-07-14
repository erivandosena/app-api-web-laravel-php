<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->bigInteger('cod_alun', true);
            $table->string('nome_aluno', 50)->nullable();
            $table->string('rg', 25)->nullable();
            $table->string('cpf', 14)->nullable()->unique('aluno_uniq');
            $table->binary('foto')->nullable();
            $table->timestamp('data_nascimento')->nullable();
            $table->string('naturalidade', 25)->nullable();
            $table->string('estado_naturalidade', 25)->nullable();
            $table->string('nacionalidade', 25)->nullable();
            $table->string('endereco', 50)->nullable();
            $table->string('bairro', 30)->nullable();
            $table->string('cidade', 25)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('estado', 25)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('tel_aluno', 20)->nullable();
            $table->string('tel_cel_aluno', 20)->nullable();
            $table->string('sexo', 9)->nullable();
            $table->string('religiao', 30)->nullable();
            $table->string('escola_anterior', 50)->nullable();
            $table->string('cidade_esco_ant', 25)->nullable();
            $table->string('estado_esco_ant', 25)->nullable();
            $table->string('uf_esco_ant', 2)->nullable();
            $table->string('tel_esco_ant', 20)->nullable();
            $table->text('problemas_saude')->nullable();
            $table->text('remedios_proibidos')->nullable();
            $table->text('remedios_utilizados')->nullable();
            $table->string('nome_pai', 50)->nullable();
            $table->timestamp('data_nasc_pai')->nullable();
            $table->string('nacionalidade_pai', 25)->nullable();
            $table->string('naturalidade_pai', 25)->nullable();
            $table->string('rg_pai', 25)->nullable();
            $table->string('cpf_pai', 14)->nullable();
            $table->string('tel_pai', 20)->nullable();
            $table->string('tel_trab_pai', 20)->nullable();
            $table->string('tel_cel_pai', 20)->nullable();
            $table->string('local_trab_pai', 30)->nullable();
            $table->string('profissao_pai', 30)->nullable();
            $table->decimal('renda_pai', 20)->nullable();
            $table->string('endereco_pai', 50)->nullable();
            $table->string('bairro_pai', 30)->nullable();
            $table->string('cidade_pai', 25)->nullable();
            $table->string('cep_pai', 10)->nullable();
            $table->string('estado_pai', 25)->nullable();
            $table->string('uf_pai', 2)->nullable();
            $table->string('nome_mae', 50)->nullable();
            $table->timestamp('data_nasc_mae')->nullable();
            $table->string('nacionalidade_mae', 25)->nullable();
            $table->string('naturalidade_mae', 25)->nullable();
            $table->string('rg_mae', 25)->nullable();
            $table->string('cpf_mae', 14)->nullable();
            $table->string('tel_mae', 20)->nullable();
            $table->string('tel_trab_mae', 20)->nullable();
            $table->string('tel_cel_mae', 20)->nullable();
            $table->string('local_trab_mae', 30)->nullable();
            $table->string('profissao_mae', 30)->nullable();
            $table->decimal('renda_mae', 20)->nullable();
            $table->string('endereco_mae', 50)->nullable();
            $table->string('bairro_mae', 30)->nullable();
            $table->string('cidade_mae', 25)->nullable();
            $table->string('cep_mae', 10)->nullable();
            $table->string('estado_mae', 25)->nullable();
            $table->string('uf_mae', 2)->nullable();
            $table->string('nome_resp', 50)->nullable();
            $table->timestamp('data_nasc_resp')->nullable();
            $table->string('nacionalidade_resp', 25)->nullable();
            $table->string('naturalidade_resp', 25)->nullable();
            $table->string('rg_resp', 25)->nullable();
            $table->string('cpf_resp', 14)->nullable();
            $table->string('tel_resp', 20)->nullable();
            $table->string('tel_trab_resp', 20)->nullable();
            $table->string('tel_cel_resp', 20)->nullable();
            $table->string('local_trab_resp', 30)->nullable();
            $table->string('profissao_resp', 30)->nullable();
            $table->decimal('renda_resp', 20)->nullable();
            $table->string('endereco_resp', 50)->nullable();
            $table->string('bairro_resp', 30)->nullable();
            $table->string('cidade_resp', 25)->nullable();
            $table->string('cep_resp', 10)->nullable();
            $table->string('estado_resp', 25)->nullable();
            $table->string('uf_resp', 2)->nullable();
            $table->string('situacao_aluno', 15)->nullable();
            $table->timestamp('data_cadastro')->nullable();
            $table->text('fotografia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}
