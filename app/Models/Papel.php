<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Papel
 *
 * @property int $id
 * @property character varying $name
 * @property character varying $slug
 * @property timestamp without time zone|null $created_at
 * @property timestamp without time zone|null $updated_at
 *
 * @property Collection|Usuario[] $usuarios
 * @property Collection|Permissao[] $permissoes
 *
 * @package App\Models
 */
class Papel extends Model
{
    protected $table = 'papeis';

    protected $guarded = [];

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
        //return $this->belongsToMany(Usuario::class, 'usuarios_papeis', 'role_id', 'user_id');
		return $this->belongsToMany(Usuario::class, 'usuarios_papeis');
	}

	public function permissoes()
	{
        //return $this->belongsToMany(Permissao::class, 'papeis_permissoes', 'role_id', 'permission_id');
		return $this->belongsToMany(Permissao::class, 'papeis_permissoes');
	}
}
