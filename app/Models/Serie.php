<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Series
 *
 * @property int $cod_seri
 * @property character varying|null $nome_serie
 * @property int $cod_esco
 *
 * @property Escola $escola
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Serie extends Model
{
	protected $table = 'series';
	protected $primaryKey = 'cod_seri';
	public $timestamps = false;

	protected $casts = [
		'nome_serie' => 'character varying',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'nome_serie',
		'cod_esco'
	];

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_seri');
	}
}
