<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Matricula
 * 
 * @property int $cod_matr
 * @property character varying|null $matricula
 * @property int|null $cod_alun
 * @property int|null $cod_curs
 * @property int|null $cod_seri
 * @property int|null $cod_turn
 * @property int|null $cod_turm
 * @property int|null $cod_leti
 * @property int $cod_esco
 * 
 * @property Aluno $aluno
 * @property Curso $curso
 * @property Series $series
 * @property Turno $turno
 * @property Turma $turma
 * @property Letivo $letivo
 * @property Escola $escola
 * @property Collection|Contrato[] $contratos
 * @property Collection|Boletin[] $boletins
 *
 * @package App\Models
 */
class Matricula extends Model
{
	protected $table = 'matriculas';
	protected $primaryKey = 'cod_matr';
	public $timestamps = false;

	protected $casts = [
		'matricula' => 'character varying',
		'cod_alun' => 'int',
		'cod_curs' => 'int',
		'cod_seri' => 'int',
		'cod_turn' => 'int',
		'cod_turm' => 'int',
		'cod_leti' => 'int',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'matricula',
		'cod_alun',
		'cod_curs',
		'cod_seri',
		'cod_turn',
		'cod_turm',
		'cod_leti',
		'cod_esco'
	];

	public function aluno()
	{
		return $this->belongsTo(Aluno::class, 'cod_alun');
	}

	public function curso()
	{
		return $this->belongsTo(Curso::class, 'cod_curs');
	}

	public function series()
	{
		return $this->belongsTo(Series::class, 'cod_seri');
	}

	public function turno()
	{
		return $this->belongsTo(Turno::class, 'cod_turn');
	}

	public function turma()
	{
		return $this->belongsTo(Turma::class, 'cod_turm');
	}

	public function letivo()
	{
		return $this->belongsTo(Letivo::class, 'cod_leti');
	}

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function contratos()
	{
		return $this->hasMany(Contrato::class, 'cod_matr');
	}

	public function boletins()
	{
		return $this->hasMany(Boletin::class, 'cod_matr');
	}
}
