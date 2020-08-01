<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permisso
 *
 * @property int $id
 * @property character varying $name
 * @property character varying $slug
 * @property timestamp without time zone|null $created_at
 * @property timestamp without time zone|null $updated_at
 *
 * @property Collection|Usuario[] $usuarios
 * @property Collection|Papei[] $papeis
 *
 * @package App\Models
 */
class Permissao extends Model
{
	protected $table = 'permissoes';

	protected $casts = [
		'name' => 'character varying',
		'slug' => 'character varying',
		'created_at' => 'timestamp without time zone',
		'updated_at' => 'timestamp without time zone'
	];

	protected $fillable = [
		'name',
		'slug'
	];

	public function usuarios()
	{
		return $this->belongsToMany(Usuario::class, 'usuarios_permissoes', 'permission_id', 'user_id');
	}

	public function papeis()
	{
		return $this->belongsToMany(Papei::class, 'papeis_permissoes', 'permission_id', 'role_id');
	}
}
