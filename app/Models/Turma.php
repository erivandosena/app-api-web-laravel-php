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
 * @property int $cod_esco
 * 
 * @property Escola $escola
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Turma extends Model
{
	protected $table = 'turmas';
	protected $primaryKey = 'cod_turm';
	public $timestamps = false;

	protected $casts = [
		'nome_turma' => 'character varying',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'nome_turma',
		'cod_esco'
	];

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_turm');
	}
}
