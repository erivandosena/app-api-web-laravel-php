<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Letivo
 * 
 * @property int $cod_leti
 * @property character varying|null $ano_letivo
 * 
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Letivo extends Model
{
	protected $table = 'letivo';
	protected $primaryKey = 'cod_leti';
	public $timestamps = false;

	protected $casts = [
		'ano_letivo' => 'character varying'
	];

	protected $fillable = [
		'ano_letivo'
	];

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_leti');
	}
}
