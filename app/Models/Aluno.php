<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Aluno
 * 
 * @property int $cod_alun
 * @property character varying|null $nome_aluno
 * @property character varying|null $rg
 * @property character varying|null $cpf
 * @property bytea|null $foto
 * @property timestamp without time zone|null $data_nascimento
 * @property character varying|null $naturalidade
 * @property character varying|null $estado_naturalidade
 * @property character varying|null $nacionalidade
 * @property character varying|null $endereco
 * @property character varying|null $bairro
 * @property character varying|null $cidade
 * @property character varying|null $cep
 * @property character varying|null $estado
 * @property character varying|null $uf
 * @property character varying|null $tel_aluno
 * @property character varying|null $tel_cel_aluno
 * @property character varying|null $sexo
 * @property character varying|null $religiao
 * @property character varying|null $escola_anterior
 * @property character varying|null $cidade_esco_ant
 * @property character varying|null $estado_esco_ant
 * @property character varying|null $uf_esco_ant
 * @property character varying|null $tel_esco_ant
 * @property string|null $problemas_saude
 * @property string|null $remedios_proibidos
 * @property string|null $remedios_utilizados
 * @property character varying|null $nome_pai
 * @property timestamp without time zone|null $data_nasc_pai
 * @property character varying|null $nacionalidade_pai
 * @property character varying|null $naturalidade_pai
 * @property character varying|null $rg_pai
 * @property character varying|null $cpf_pai
 * @property character varying|null $tel_pai
 * @property character varying|null $tel_trab_pai
 * @property character varying|null $tel_cel_pai
 * @property character varying|null $local_trab_pai
 * @property character varying|null $profissao_pai
 * @property float|null $renda_pai
 * @property character varying|null $endereco_pai
 * @property character varying|null $bairro_pai
 * @property character varying|null $cidade_pai
 * @property character varying|null $cep_pai
 * @property character varying|null $estado_pai
 * @property character varying|null $uf_pai
 * @property character varying|null $nome_mae
 * @property timestamp without time zone|null $data_nasc_mae
 * @property character varying|null $nacionalidade_mae
 * @property character varying|null $naturalidade_mae
 * @property character varying|null $rg_mae
 * @property character varying|null $cpf_mae
 * @property character varying|null $tel_mae
 * @property character varying|null $tel_trab_mae
 * @property character varying|null $tel_cel_mae
 * @property character varying|null $local_trab_mae
 * @property character varying|null $profissao_mae
 * @property float|null $renda_mae
 * @property character varying|null $endereco_mae
 * @property character varying|null $bairro_mae
 * @property character varying|null $cidade_mae
 * @property character varying|null $cep_mae
 * @property character varying|null $estado_mae
 * @property character varying|null $uf_mae
 * @property character varying|null $nome_resp
 * @property timestamp without time zone|null $data_nasc_resp
 * @property character varying|null $nacionalidade_resp
 * @property character varying|null $naturalidade_resp
 * @property character varying|null $rg_resp
 * @property character varying|null $cpf_resp
 * @property character varying|null $tel_resp
 * @property character varying|null $tel_trab_resp
 * @property character varying|null $tel_cel_resp
 * @property character varying|null $local_trab_resp
 * @property character varying|null $profissao_resp
 * @property float|null $renda_resp
 * @property character varying|null $endereco_resp
 * @property character varying|null $bairro_resp
 * @property character varying|null $cidade_resp
 * @property character varying|null $cep_resp
 * @property character varying|null $estado_resp
 * @property character varying|null $uf_resp
 * @property character varying|null $situacao_aluno
 * @property timestamp without time zone|null $data_cadastro
 * @property string|null $fotografia
 * 
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Aluno extends Model
{
	protected $table = 'aluno';
	protected $primaryKey = 'cod_alun';
	public $timestamps = false;

	protected $hidden = ['foto'];

	protected $casts = [
		'nome_aluno' => 'character varying',
		'rg' => 'character varying',
		'cpf' => 'character varying',
		'foto' => 'bytea',
		'data_nascimento' => 'timestamp without time zone',
		'naturalidade' => 'character varying',
		'estado_naturalidade' => 'character varying',
		'nacionalidade' => 'character varying',
		'endereco' => 'character varying',
		'bairro' => 'character varying',
		'cidade' => 'character varying',
		'cep' => 'character varying',
		'estado' => 'character varying',
		'uf' => 'character varying',
		'tel_aluno' => 'character varying',
		'tel_cel_aluno' => 'character varying',
		'sexo' => 'character varying',
		'religiao' => 'character varying',
		'escola_anterior' => 'character varying',
		'cidade_esco_ant' => 'character varying',
		'estado_esco_ant' => 'character varying',
		'uf_esco_ant' => 'character varying',
		'tel_esco_ant' => 'character varying',
		'nome_pai' => 'character varying',
		'data_nasc_pai' => 'timestamp without time zone',
		'nacionalidade_pai' => 'character varying',
		'naturalidade_pai' => 'character varying',
		'rg_pai' => 'character varying',
		'cpf_pai' => 'character varying',
		'tel_pai' => 'character varying',
		'tel_trab_pai' => 'character varying',
		'tel_cel_pai' => 'character varying',
		'local_trab_pai' => 'character varying',
		'profissao_pai' => 'character varying',
		'renda_pai' => 'float',
		'endereco_pai' => 'character varying',
		'bairro_pai' => 'character varying',
		'cidade_pai' => 'character varying',
		'cep_pai' => 'character varying',
		'estado_pai' => 'character varying',
		'uf_pai' => 'character varying',
		'nome_mae' => 'character varying',
		'data_nasc_mae' => 'timestamp without time zone',
		'nacionalidade_mae' => 'character varying',
		'naturalidade_mae' => 'character varying',
		'rg_mae' => 'character varying',
		'cpf_mae' => 'character varying',
		'tel_mae' => 'character varying',
		'tel_trab_mae' => 'character varying',
		'tel_cel_mae' => 'character varying',
		'local_trab_mae' => 'character varying',
		'profissao_mae' => 'character varying',
		'renda_mae' => 'float',
		'endereco_mae' => 'character varying',
		'bairro_mae' => 'character varying',
		'cidade_mae' => 'character varying',
		'cep_mae' => 'character varying',
		'estado_mae' => 'character varying',
		'uf_mae' => 'character varying',
		'nome_resp' => 'character varying',
		'data_nasc_resp' => 'timestamp without time zone',
		'nacionalidade_resp' => 'character varying',
		'naturalidade_resp' => 'character varying',
		'rg_resp' => 'character varying',
		'cpf_resp' => 'character varying',
		'tel_resp' => 'character varying',
		'tel_trab_resp' => 'character varying',
		'tel_cel_resp' => 'character varying',
		'local_trab_resp' => 'character varying',
		'profissao_resp' => 'character varying',
		'renda_resp' => 'float',
		'endereco_resp' => 'character varying',
		'bairro_resp' => 'character varying',
		'cidade_resp' => 'character varying',
		'cep_resp' => 'character varying',
		'estado_resp' => 'character varying',
		'uf_resp' => 'character varying',
		'situacao_aluno' => 'character varying',
		'data_cadastro' => 'timestamp without time zone'
	];

	protected $fillable = [
		'nome_aluno',
		'rg',
		'cpf',
		'foto',
		'data_nascimento',
		'naturalidade',
		'estado_naturalidade',
		'nacionalidade',
		'endereco',
		'bairro',
		'cidade',
		'cep',
		'estado',
		'uf',
		'tel_aluno',
		'tel_cel_aluno',
		'sexo',
		'religiao',
		'escola_anterior',
		'cidade_esco_ant',
		'estado_esco_ant',
		'uf_esco_ant',
		'tel_esco_ant',
		'problemas_saude',
		'remedios_proibidos',
		'remedios_utilizados',
		'nome_pai',
		'data_nasc_pai',
		'nacionalidade_pai',
		'naturalidade_pai',
		'rg_pai',
		'cpf_pai',
		'tel_pai',
		'tel_trab_pai',
		'tel_cel_pai',
		'local_trab_pai',
		'profissao_pai',
		'renda_pai',
		'endereco_pai',
		'bairro_pai',
		'cidade_pai',
		'cep_pai',
		'estado_pai',
		'uf_pai',
		'nome_mae',
		'data_nasc_mae',
		'nacionalidade_mae',
		'naturalidade_mae',
		'rg_mae',
		'cpf_mae',
		'tel_mae',
		'tel_trab_mae',
		'tel_cel_mae',
		'local_trab_mae',
		'profissao_mae',
		'renda_mae',
		'endereco_mae',
		'bairro_mae',
		'cidade_mae',
		'cep_mae',
		'estado_mae',
		'uf_mae',
		'nome_resp',
		'data_nasc_resp',
		'nacionalidade_resp',
		'naturalidade_resp',
		'rg_resp',
		'cpf_resp',
		'tel_resp',
		'tel_trab_resp',
		'tel_cel_resp',
		'local_trab_resp',
		'profissao_resp',
		'renda_resp',
		'endereco_resp',
		'bairro_resp',
		'cidade_resp',
		'cep_resp',
		'estado_resp',
		'uf_resp',
		'situacao_aluno',
		'data_cadastro',
		'fotografia'
	];

	//protected $guarded = [];

	public function rules($id=0){
		
		return [
			'nome_aluno' => 'required|max:50',
			'cpf' => 'required|min:11|max:14|unique:aluno,cpf' . ($id ? ",$id,$this->primaryKey" : '') 
		];
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_alun');
	}
}
