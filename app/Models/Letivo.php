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
 * @property int $cod_esco
 * 
 * @property Escola $escola
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Letivo extends Model
{
	protected $table = 'letivos';
	protected $primaryKey = 'cod_leti';
	public $timestamps = false;

	protected $casts = [
		'ano_letivo' => 'character varying',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'ano_letivo',
		'cod_esco'
	];

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_leti');
	}
}
