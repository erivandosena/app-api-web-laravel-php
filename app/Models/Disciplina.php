<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Disciplina
 * 
 * @property int $cod_disc
 * @property character varying|null $disciplina
 * @property character varying|null $ldb
 * @property character varying|null $distribuida
 * @property character varying|null $unificacao
 * @property int $cod_esco
 * 
 * @property Escola $escola
 * @property Collection|Nota[] $notas
 *
 * @package App\Models
 */
class Disciplina extends Model
{
	protected $table = 'disciplinas';
	protected $primaryKey = 'cod_disc';
	public $timestamps = false;

	protected $casts = [
		'disciplina' => 'character varying',
		'ldb' => 'character varying',
		'distribuida' => 'character varying',
		'unificacao' => 'character varying',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'disciplina',
		'ldb',
		'distribuida',
		'unificacao',
		'cod_esco'
	];

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function notas()
	{
		return $this->hasMany(Nota::class, 'cod_disc');
	}
}
