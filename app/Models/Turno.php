<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Turno
 * 
 * @property int $cod_turn
 * @property character varying|null $nome_turno
 * 
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Turno extends Model
{
	protected $table = 'turno';
	protected $primaryKey = 'cod_turn';
	public $timestamps = false;

	protected $casts = [
		'nome_turno' => 'character varying'
	];

	protected $fillable = [
		'nome_turno'
	];

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_turn');
	}
}
