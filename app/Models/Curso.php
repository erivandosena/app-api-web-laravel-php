<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 * 
 * @property int $cod_curs
 * @property character varying|null $nome_curso
 * @property int $cod_esco
 * 
 * @property Escola $escola
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Curso extends Model
{
	protected $table = 'cursos';
	protected $primaryKey = 'cod_curs';
	public $timestamps = false;

	protected $casts = [
		'nome_curso' => 'character varying',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'nome_curso',
		'cod_esco'
	];

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_curs');
	}
}
