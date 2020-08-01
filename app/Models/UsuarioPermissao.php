<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuariosPermisso
 *
 * @property int $user_id
 * @property int $permission_id
 *
 * @property Usuario $usuario
 * @property Permisso $permisso
 *
 * @package App\Models
 */
class UsuarioPermissao extends Model
{
	protected $table = 'usuarios_permissoes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'permission_id' => 'int'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'user_id');
	}

	public function permisso()
	{
		return $this->belongsTo(Permisso::class, 'permission_id');
	}
}
