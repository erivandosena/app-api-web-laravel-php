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
 * 
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Curso extends Model
{
	protected $table = 'curso';
	protected $primaryKey = 'cod_curs';
	public $timestamps = false;

	protected $casts = [
		'nome_curso' => 'character varying'
	];

	protected $fillable = [
		'nome_curso'
	];

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_curs');
	}
}
