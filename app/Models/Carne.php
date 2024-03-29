<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carne
 * 
 * @property int $cod_carn
 * @property int $cod_cont
 * @property character varying|null $numero_doc
 * @property character varying|null $mes
 * @property timestamp without time zone|null $data_vencimento
 * @property timestamp without time zone|null $data_pagamento
 * @property float|null $valor_mensal
 * @property float|null $valor_acresc
 * @property float|null $valor_descon
 * @property character varying|null $numero_parcela
 * @property character varying|null $situacao_parcela
 * @property float|null $valor_apagar
 * @property float|null $valor_pago
 * @property float|null $valor_pendente
 * @property float|null $total_pago
 * @property int $cod_esco
 * 
 * @property Contrato $contrato
 * @property Escola $escola
 *
 * @package App\Models
 */
class Carne extends Model
{
	protected $table = 'carnes';
	protected $primaryKey = 'cod_carn';
	public $timestamps = false;

	protected $casts = [
		'cod_cont' => 'int',
		'numero_doc' => 'character varying',
		'mes' => 'character varying',
		'data_vencimento' => 'timestamp without time zone',
		'data_pagamento' => 'timestamp without time zone',
		'valor_mensal' => 'float',
		'valor_acresc' => 'float',
		'valor_descon' => 'float',
		'numero_parcela' => 'character varying',
		'situacao_parcela' => 'character varying',
		'valor_apagar' => 'float',
		'valor_pago' => 'float',
		'valor_pendente' => 'float',
		'total_pago' => 'float',
		'cod_esco' => 'int'
	];

	protected $fillable = [
		'cod_cont',
		'numero_doc',
		'mes',
		'data_vencimento',
		'data_pagamento',
		'valor_mensal',
		'valor_acresc',
		'valor_descon',
		'numero_parcela',
		'situacao_parcela',
		'valor_apagar',
		'valor_pago',
		'valor_pendente',
		'total_pago',
		'cod_esco'
	];

	public function contrato()
	{
		return $this->belongsTo(Contrato::class, 'cod_cont');
	}

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}
}
