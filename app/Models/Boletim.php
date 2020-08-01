<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Boletin
 *
 * @property int $cod_bole
 * @property int $cod_matr
 * @property int $cod_nota
 * @property int $cod_esco
 *
 * @property Matricula $matricula
 * @property Nota $nota
 * @property Escola $escola
 *
 * @package App\Models
 */
class Boletim extends Model
{
	protected $table = 'boletins';
	protected $primaryKey = 'cod_bole';
	public $timestamps = false;

	protected $casts = [
		'cod_matr' => 'int',
		'cod_nota' => 'int',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'cod_matr',
		'cod_nota',
		'cod_esco'
	];

	public function matricula()
	{
		return $this->belongsTo(Matricula::class, 'cod_matr');
	}

	public function nota()
	{
		return $this->belongsTo(Nota::class, 'cod_nota');
	}

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}
}
