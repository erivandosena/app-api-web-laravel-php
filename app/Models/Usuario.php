<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * Class Usuario
 *
 * @property int $id
 * @property character varying $name
 * @property character varying $email
 * @property character varying $password
 * @property character varying|null $remember_token
 * @property timestamp without time zone|null $created_at
 * @property timestamp without time zone|null $updated_at
 * @property string|null $avatar
 * @property int $cod_esco
 *
 * @property Escola $escola
 * @property Collection|Papel[] $papeis
 * @property Collection|Permissao[] $permissos
 *
 * @package App\Models
 */
class Usuario extends User //Model
{
    protected $table = 'usuarios';

	protected $casts = [
		'name' => 'character varying',
		'email' => 'character varying',
		'password' => 'character varying',
		'remember_token' => 'character varying',
		'created_at' => 'timestamp without time zone',
		'updated_at' => 'timestamp without time zone',
		'cod_esco' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'remember_token',
		'avatar',
		'cod_esco'
    ];

	public function rules($id=0){

		return [
            'name' => 'required|min:2|max:20',
            'rg' => 'max:25',
            'email' => 'string|required|email|min:10|max:150|unique:usuarios,email'. ($id ? ",$id,$this->id" : ''),
            'password' => 'required|confirmed|string|min:6',
            'avatar' => 'string',
            'cod_esco' => 'int'
		];
	}

	public function escola()
	{
		return $this->belongsTo(Escola::class, 'cod_esco');
	}

	public function papeis()
	{
		return $this->belongsToMany(Papel::class, 'usuarios_papeis', 'user_id', 'role_id');
	}

	public function permissoes()
	{
		return $this->belongsToMany(Permissao::class, 'usuarios_permissoes', 'user_id', 'permission_id');
	}
}
