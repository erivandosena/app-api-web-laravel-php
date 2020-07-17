<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends MasterController
{
    protected $model;

    public function __construct(Turma $turma, Request $request)
    {
        $this->middleware('auth:api');
        $this->model = $turma;
        $this->request = $request;
    }

}
