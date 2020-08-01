<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Escola
 * 
 * @property int $cod_esco
 * @property character varying|null $nome_empresarial
 * @property character varying|null $nome_fantasia
 * @property character varying $cnpj
 * @property character varying|null $ie
 * @property character varying|null $slogan
 * @property string|null $logotipo
 * @property character varying|null $endereco
 * @property character varying|null $bairro
 * @property character varying|null $cep
 * @property character varying|null $cidade
 * @property character varying|null $estado
 * @property character varying|null $uf
 * @property character varying|null $telefone
 * @property character varying|null $rede_social
 * @property character varying|null $email
 * @property character varying|null $website
 * @property character varying|null $diretor
 * @property character varying|null $diretor_reg
 * @property character varying|null $secretario
 * @property character varying|null $secretario_reg
 * @property character varying|null $entid_mantenedora
 * @property character varying|null $dependencia_admin
 * @property character varying|null $credenc_parecer
 * @property character varying|null $credenc_parecer_val
 * @property character varying|null $recredenc_parecer
 * @property character varying|null $recredenc_parecer_val
 * @property character varying|null $orgao_expedidor
 * @property character varying|null $orgao_expedidor_val
 * @property character varying|null $diario_oficial
 * 
 * @property Collection|Disciplina[] $disciplinas
 * @property Collection|Carne[] $carnes
 * @property Collection|Contrato[] $contratos
 * @property Collection|Boletin[] $boletins
 * @property Collection|Nota[] $notas
 * @property Collection|Matricula[] $matriculas
 * @property Collection|Letivo[] $letivos
 * @property Collection|Turno[] $turnos
 * @property Collection|Turma[] $turmas
 * @property Collection|Series[] $series
 * @property Collection|Curso[] $cursos
 * @property Collection|Usuario[] $usuarios
 * @property Collection|Aluno[] $alunos
 *
 * @package App\Models
 */
class Escola extends Model
{
	protected $table = 'escolas';
	protected $primaryKey = 'cod_esco';
	public $timestamps = false;

	protected $casts = [
		'nome_empresarial' => 'character varying',
		'nome_fantasia' => 'character varying',
		'cnpj' => 'character varying',
		'ie' => 'character varying',
		'slogan' => 'character varying',
		'endereco' => 'character varying',
		'bairro' => 'character varying',
		'cep' => 'character varying',
		'cidade' => 'character varying',
		'estado' => 'character varying',
		'uf' => 'character varying',
		'telefone' => 'character varying',
		'rede_social' => 'character varying',
		'email' => 'character varying',
		'website' => 'character varying',
		'diretor' => 'character varying',
		'diretor_reg' => 'character varying',
		'secretario' => 'character varying',
		'secretario_reg' => 'character varying',
		'entid_mantenedora' => 'character varying',
		'dependencia_admin' => 'character varying',
		'credenc_parecer' => 'character varying',
		'credenc_parecer_val' => 'character varying',
		'recredenc_parecer' => 'character varying',
		'recredenc_parecer_val' => 'character varying',
		'orgao_expedidor' => 'character varying',
		'orgao_expedidor_val' => 'character varying',
		'diario_oficial' => 'character varying'
	];

	protected $hidden = [
		'secretario',
		'secretario_reg'
	];

	protected $fillable = [
		'nome_empresarial',
		'nome_fantasia',
		'cnpj',
		'ie',
		'slogan',
		'logotipo',
		'endereco',
		'bairro',
		'cep',
		'cidade',
		'estado',
		'uf',
		'telefone',
		'rede_social',
		'email',
		'website',
		'diretor',
		'diretor_reg',
		'secretario',
		'secretario_reg',
		'entid_mantenedora',
		'dependencia_admin',
		'credenc_parecer',
		'credenc_parecer_val',
		'recredenc_parecer',
		'recredenc_parecer_val',
		'orgao_expedidor',
		'orgao_expedidor_val',
		'diario_oficial'
	];

	public function disciplinas()
	{
		return $this->hasMany(Disciplina::class, 'cod_esco');
	}

	public function carnes()
	{
		return $this->hasMany(Carne::class, 'cod_esco');
	}

	public function contratos()
	{
		return $this->hasMany(Contrato::class, 'cod_esco');
	}

	public function boletins()
	{
		return $this->hasMany(Boletin::class, 'cod_esco');
	}

	public function notas()
	{
		return $this->hasMany(Nota::class, 'cod_esco');
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_esco');
	}

	public function letivos()
	{
		return $this->hasMany(Letivo::class, 'cod_esco');
	}

	public function turnos()
	{
		return $this->hasMany(Turno::class, 'cod_esco');
	}

	public function turmas()
	{
		return $this->hasMany(Turma::class, 'cod_esco');
	}

	public function series()
	{
		return $this->hasMany(Series::class, 'cod_esco');
	}

	public function cursos()
	{
		return $this->hasMany(Curso::class, 'cod_esco');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'cod_esco');
	}

	public function alunos()
	{
		return $this->hasMany(Aluno::class, 'cod_esco');
	}
}
