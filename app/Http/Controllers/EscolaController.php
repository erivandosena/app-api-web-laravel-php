<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escola;

class EscolaController extends MasterController
{
    protected $model;

    public function __construct(Escola $escola, Request $request)
    {
        $this->model = $escola;
        $this->request = $request;
    }

	public function showCadastroEscola($id) {
        $dados = $this->model->findOrFail($id);
        return view('editaEscola', compact('dados'));
    }

}
