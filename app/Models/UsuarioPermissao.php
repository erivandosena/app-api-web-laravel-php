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

    protected $primaryKey = 'permissao_id';

	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int',
		'permissao_id' => 'int'
    ];

	protected $fillable = [
        'usuario_id',
        'permissao_id'
	];

	public function rules($id=0){
		return [
            'usuario_id' => 'required|int',
            'permissao_id' => 'required|int|unique:usuarios_permissoes,permissao_id'. ($id ? ",$id,$this->id" : ''),
		];
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_id');
	}

	public function permissao()
	{
		return $this->belongsTo(Permissao::class, 'permissao_id');
	}
}
