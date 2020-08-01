<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PapeisPermisso
 *
 * @property int $role_id
 * @property int $permission_id
 *
 * @property Papei $papei
 * @property Permisso $permisso
 *
 * @package App\Models
 */
class PapelPermissao extends Model
{
	protected $table = 'papeis_permissoes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'role_id' => 'int',
		'permission_id' => 'int'
	];

	public function papei()
	{
		return $this->belongsTo(Papei::class, 'role_id');
	}

	public function permisso()
	{
		return $this->belongsTo(Permisso::class, 'permission_id');
	}
}
