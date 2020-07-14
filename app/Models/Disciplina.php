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
 * 
 * @property Collection|Notum[] $nota
 *
 * @package App\Models
 */
class Disciplina extends Model
{
	protected $table = 'disciplina';
	protected $primaryKey = 'cod_disc';
	public $timestamps = false;

	protected $casts = [
		'disciplina' => 'character varying',
		'ldb' => 'character varying',
		'distribuida' => 'character varying',
		'unificacao' => 'character varying'
	];

	protected $fillable = [
		'disciplina',
		'ldb',
		'distribuida',
		'unificacao'
	];

	public function nota()
	{
		return $this->hasMany(Notum::class, 'cod_disc');
	}
}
