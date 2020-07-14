<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $cod_usua
 * @property character varying $nome_usuario
 * @property character varying|null $senha
 * @property character varying|null $anterior
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'cod_usua';
	public $timestamps = false;

	protected $casts = [
		'nome_usuario' => 'character varying',
		'senha' => 'character varying',
		'anterior' => 'character varying'
	];

	protected $fillable = [
		'nome_usuario',
		'senha',
		'anterior'
	];
}
