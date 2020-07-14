<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Turma
 * 
 * @property int $cod_turm
 * @property character varying|null $nome_turma
 * 
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Turma extends Model
{
	protected $table = 'turma';
	protected $primaryKey = 'cod_turm';
	public $timestamps = false;

	protected $casts = [
		'nome_turma' => 'character varying'
	];

	protected $fillable = [
		'nome_turma'
	];

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_turm');
	}
}
