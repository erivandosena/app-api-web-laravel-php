<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nota
 * 
 * @property int $cod_nota
 * @property int $cod_disc
 * @property character varying|null $etapa_1_mar
 * @property character varying|null $etapa_1_abr
 * @property character varying|null $etapa_1_av3
 * @property character varying|null $etapa_1_m
 * @property character varying|null $etapa_1_r
 * @property character varying|null $etapa_2_mai
 * @property character varying|null $etapa_2_jun
 * @property character varying|null $etapa_2_av3
 * @property character varying|null $etapa_2_m
 * @property character varying|null $etapa_2_r
 * @property character varying|null $etapa_3_ago
 * @property character varying|null $etapa_3_set
 * @property character varying|null $etapa_3_av3
 * @property character varying|null $etapa_3_m
 * @property character varying|null $etapa_3_r
 * @property character varying|null $etapa_4_out
 * @property character varying|null $etapa_4_nov
 * @property character varying|null $etapa_4_av3
 * @property character varying|null $etapa_4_m
 * @property character varying|null $etapa_4_r
 * @property character varying|null $provao
 * @property character varying|null $provao_r
 * @property character varying|null $media_final
 * @property int|null $faltas
 * @property character varying|null $pontos
 * @property character varying|null $resultado_final
 * @property character varying|null $tipo_distribuida
 * @property int $cod_esco
 * 
 * @property Disciplina $disciplina
 * @property Escola $escola
 * @property Collection|Boletin[] $boletins
 *
 * @package App\Models
 */
class Nota extends Model
{
	protected $table = 'notas';
	protected $primaryKey = 'cod_nota';
	public $timestamps = false;

	protected $casts = [
		'cod_disc' => 'int',
		'etapa_1_mar' => 'character varying',
		'etapa_1_abr' => 'character varying',
		'etapa_1_av3' => 'character varying',
		'etapa_1_m' => 'character varying',
		'etapa_1_r' => 'character varying',
		'etapa_2_mai' => 'character varying',
		'etapa_2_jun' => 'character varying',
		'etapa_2_av3' => 'character varying',
		'etapa_2_m' => 'character varying',
		'etapa_2_r' => 'character varying',
		'etapa_3_ago' => 'character varying',
		'etapa_3_set' => 'character varying',
		'etapa_3_av3' => 'character varying',
		'etapa_3_m' => 'character varying',
		'etapa_3_r' => 'character varying',
		'etapa_4_out' => 'character varying',
		'etapa_4_nov' => 'character varying',
		'etapa_4_av3' => 'character varying',
		'etapa_4_m' => 'character varying',
		'etapa_4_r' => 'character varying',
		'provao' => 'character varying',
		'provao_r' => 'character varying',
		'media_final' => 'character varying',
		'faltas' => 'int',
		'pontos' => 'character varying',
		'resultado_final' => 'character varying',
		'tipo_distribuida' => 'character varying',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'cod_disc',
		'etapa_1_mar',
		'etapa_1_abr',
		'etapa_1_av3',
		'etapa_1_m',
		'etapa_1_r',
		'etapa_2_mai',
		'etapa_2_jun',
		'etapa_2_av3',
		'etapa_2_m',
		'etapa_2_r',
		'etapa_3_ago',
		'etapa_3_set',
		'etapa_3_av3',
		'etapa_3_m',
		'etapa_3_r',
		'etapa_4_out',
		'etapa_4_nov',
		'etapa_4_av3',
		'etapa_4_m',
		'etapa_4_r',
		'provao',
		'provao_r',
		'media_final',
		'faltas',
		'pontos',
		'resultado_final',
		'tipo_distribuida',
		'cod_esco'
	];

	public function disciplina()
	{
		return $this->belongsTo(Disciplina::class, 'cod_disc');
	}

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function boletins()
	{
		return $this->hasMany(Boletin::class, 'cod_nota');
	}
}
