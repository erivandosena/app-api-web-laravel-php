<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuariosPapei
 *
 * @property int $user_id
 * @property int $role_id
 *
 * @property Usuario $usuario
 * @property Papei $papei
 *
 * @package App\Models
 */
class UsuarioPapel extends Model
{
	protected $table = 'usuarios_papeis';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'role_id' => 'int'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'user_id');
	}

	public function papei()
	{
		return $this->belongsTo(Papei::class, 'role_id');
	}
}
