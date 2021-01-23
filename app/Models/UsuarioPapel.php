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

    protected $primaryKey = 'papel_id';

	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int',
		'papel_id' => 'int'
    ];

	protected $fillable = [
        'usuario_id',
        'papel_id'
	];

	public function rules($id=0){
		return [
            'usuario_id' => 'required|int',
            'papel_id' => 'required|int|unique:usuarios_papeis,papel_id'. ($id ? ",$id,$this->id" : ''),
		];
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_id');
	}

	public function papel()
	{
		return $this->belongsTo(Papei::class, 'papel_id');
	}
}
