<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use App\Models\Aluno;

class AlunoController extends MasterController
{
    protected $model;

    public function __construct(Aluno $aluno, Request $request)
    {
        $this->model = $aluno; 
        $this->request = $request;       
    }

}
