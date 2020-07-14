<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Serie
 * 
 * @property int $cod_seri
 * @property character varying|null $nome_serie
 * 
 * @property Collection|Matricula[] $matriculas
 *
 * @package App\Models
 */
class Serie extends Model
{
	protected $table = 'serie';
	protected $primaryKey = 'cod_seri';
	public $timestamps = false;

	protected $casts = [
		'nome_serie' => 'character varying'
	];

	protected $fillable = [
		'nome_serie'
	];

	public function matriculas()
	{
		return $this->hasMany(Matricula::class, 'cod_seri');
	}
}
