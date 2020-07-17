<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends MasterController
{
    protected $model;

    public function __construct(Disciplina $disciplina, Request $request)
    {
        $this->middleware('api');
        $this->model = $disciplina;
        $this->request = $request;
    }

}
