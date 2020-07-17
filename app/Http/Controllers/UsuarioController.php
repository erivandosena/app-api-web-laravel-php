<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends MasterController
{
    protected $model;

    public function __construct(Usuario $usuario, Request $request)
    {
        $this->middleware('auth:api');
        $this->model = $usuario;
        $this->request = $request;
    }

}
