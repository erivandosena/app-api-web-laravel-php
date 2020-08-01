<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrato
 * 
 * @property int $cod_cont
 * @property int $cod_matr
 * @property character varying|null $numero
 * @property float|null $valor
 * @property int $cod_esco
 * 
 * @property Matricula $matricula
 * @property Escola $escola
 * @property Collection|Carne[] $carnes
 *
 * @package App\Models
 */
class Contrato extends Model
{
	protected $table = 'contratos';
	protected $primaryKey = 'cod_cont';
	public $timestamps = false;

	protected $casts = [
		'cod_matr' => 'int',
		'numero' => 'character varying',
		'valor' => 'float',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'cod_matr',
		'numero',
		'valor',
		'cod_esco'
	];

	public function matricula()
	{
		return $this->belongsTo(Matricula::class, 'cod_matr');
	}

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function carnes()
	{
		return $this->hasMany(Carne::class, 'cod_cont');
	}
}
