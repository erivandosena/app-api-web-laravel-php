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
 * @property int $cod_esco
 * 
 * @property Escola $escola
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Turno extends Model
{
	protected $table = 'turnos';
	protected $primaryKey = 'cod_turn';
	public $timestamps = false;

	protected $casts = [
		'nome_turno' => 'character varying',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'nome_turno',
		'cod_esco'
	];

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_turn');
	}
}
