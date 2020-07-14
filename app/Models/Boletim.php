<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Boletim
 * 
 * @property int $cod_bole
 * @property int $cod_matr
 * @property int $cod_nota
 * 
 * @property Matricula $matricula
 * @property Notum $notum
 *
 * @package App\Models
 */
class Boletim extends Model
{
	protected $table = 'boletim';
	protected $primaryKey = 'cod_bole';
	public $timestamps = false;

	protected $casts = [
		'cod_matr' => 'int',
		'cod_nota' => 'int'
	];

	protected $fillable = [
		'cod_matr',
		'cod_nota'
	];

	public function matricula()
	{
		return $this->belongsTo(Matricula::class, 'cod_matr');
	}

	public function notum()
	{
		return $this->belongsTo(Nota::class, 'cod_nota');
	}
}
