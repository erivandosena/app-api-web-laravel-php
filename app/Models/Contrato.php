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
 * @property int $cod_contr
 * @property int $cod_matr
 * @property character varying|null $numero
 * @property float|null $valor
 * 
 * @property Matricula $matricula
 * @property Collection|Carne[] $carnes
 *
 * @package App\Models
 */
class Contrato extends Model
{
	protected $table = 'contrato';
	protected $primaryKey = 'cod_contr';
	public $timestamps = false;

	protected $casts = [
		'cod_matr' => 'int',
		'numero' => 'character varying',
		'valor' => 'float'
	];

	protected $fillable = [
		'cod_matr',
		'numero',
		'valor'
	];

	public function matricula()
	{
		return $this->belongsTo(Matricula::class, 'cod_matr');
	}

	public function carnes()
	{
		return $this->hasMany(Carne::class, 'cod_contr');
	}
}
